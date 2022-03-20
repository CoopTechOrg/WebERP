<?php

namespace App\Http\Controllers;

use App\Core\Hash;
use App\Exceptions\InvaliedVerifyTokenException;
use App\Mail\RegisterUserMail;
use App\Models\PreUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpgradeUserRequest;

class PreUserController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        // 仮登録されているか確認
        $prevPreUser = PreUser::where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();
        $isStoredPreUser = ($prevPreUser !== null);
        $isStoredUser = ($user !== null);
        $token = Hash::makeToUrl($request->email);

        // 仮登録済みで本登録がまだの場合、トークンを送る
        if ($isStoredPreUser === true && $isStoredUser === false) {

            $prevPreUser->token = $token;
            $prevPreUser->save();

            Mail::to($prevPreUser->email)->send(new RegisterUserMail($prevPreUser->token));

            return redirect()->route('pre-complete');
        }

        // 仮登録済み本登録済みの場合ログイン画面に遷移
        if ($isStoredPreUser === true && $isStoredUser === true) {
            return redirect('/login');
        }

        // プレユーザー登録
        /**
         * @var PreUser $preUser
         */
        $preUser = PreUser::create(
            [
                'email' => $request->email,
                'token' => $token,
            ]
        );

        Mail::to($preUser->email)->send(new RegisterUserMail($preUser->token));

        return redirect()->route('pre-complete');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param string $token
     * @return View
     */
    public function verify(Request $request, string $token): View
    {

        // トークンが存在し、有効期限内か確認
        $query = PreUser::query()->where('token', $token);
        $user = $query->first();
        $isTokenExist = $query->exists();
        $isExpirted = false;

        if ($isTokenExist) {
            $now = Carbon::now();
            $yesterday = $now->copy()->subDay();
            $targetDay = $query->first()->updated_at;
            $isExpirted = $targetDay->between($yesterday, $now);
        }

        if ($isExpirted && $isTokenExist) {
            return view('auth.verify', ['user' => $user]);
        } else {
            throw new InvaliedVerifyTokenException();
        };
    }

    public function upgrade(UpgradeUserRequest $request, string $token)
    {

        // pre_userに一致するtoken、emailがあるか確認
        $query = PreUser::query()->where('token', $token)->where('email', $request->email);
        $user = $query->first();
        $isTokenExist = $query->exists();

        if ( $isTokenExist === false ) {
            throw new InvaliedVerifyTokenException();
        }

        // userに登録
        DB::beginTransaction();
        try {
            User::create(
                [
                    'family_name' => $request->family_name,
                    'given_name' => $request->given_name,
                    // 'name' => 'あとで消す', //todo: 別のマイグレーションチケットで消す
                    'email' => $user->email,
                    'password' => Hash::make($request->password),
                ]
            );

            $this->login($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->route('home');
    }
}
