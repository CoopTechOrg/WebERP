<?php

namespace App\Http\Controllers;

use App\Exceptions\InvaliedVerifyTokenException;
use App\Mail\RegisterUserMail;
use App\Models\PreUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

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
        $token = str_replace('/', '', Hash::make($request->email));

        // 既に仮登録されていて、本登録されていない。
        // もう一度トークンを作る
        // 新しいトークンをDBに登録(更新)
        // 新しいトークンでメールを送る
        // メール送信済みの画面へ
        if ($isStoredPreUser === true && $isStoredUser === false) {

            $prevPreUser->token = $token;
            $prevPreUser->save();

            Mail::to($prevPreUser->email)->send(new RegisterUserMail($prevPreUser->token));

            return redirect()->route('pre-complete');
        }

        // 仮登録されていて、かつ本登録されている。
        // 登録済みのことを伝える(まだ)withを使う
        // ログイン画面に遷移
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

        // トークンが存在するか
        // 有効期限内か(updated_at)
        // 一致したら本会員登録
        // 不一致だったらもう一度会員登録をしてくださいページ(会員登録の画面へのリンクwithでメッセージ)

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

    public function upgrade(Request $request, string $token)
    {

        // pre_userのtableに一致するトークンがあるか確認
        // ある場合、emailを取得
        $query = PreUser::query()->where('token', $token)->where('email', $request->email);
        $user = $query->first();
        $isTokenExist = $query->exists();

        if ( $isTokenExist === false ) {
            throw new InvaliedVerifyTokenException();
        }

        // 両方のパスワードが正しいかの確認
        // 届いたデータを本登録用のuserTableに入れる
        // ログインしたことにする
        // ダッシュボード画面を表示する

        $request->validate(
            [
                'family_name' => ['required', 'string', 'max:255'],
                'given_name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );

        DB::beginTransaction();
        try {
            // requestをusertableにいれる
            User::create(
                [
                    'family_name' => $request->family_name,
                    'given_name' => $request->given_name,
                    'name' => 'あとで消す', //todo: 別のマイグレーションチケットで消す
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
