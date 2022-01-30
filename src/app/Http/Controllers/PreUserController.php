<?php

namespace App\Http\Controllers;

use App\Exceptions\InvaliedVerifyTokenException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class PreUserController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // プレユーザー登録
        \App\Models\PreUser::insert(
            [
                'email' => $request->email,
                'token' => Hash::make($request->email),
            ]
        );

        // Mail::send('pre_mail', $data, function($message){
        //     $message->to($request->email)
        //     ->subject('webERP本登録用URLの送信');
        // });

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
        // 不一致だったらもう一度会員登録をしてくださいページ(会員登録の画面へのリンク)

        $query = \App\Models\PreUser::query()->where('token', $token);
        $isTokenExist = $query->exists();
        $isExpirted = false;

        if ($isTokenExist) {
            $now = Carbon::now();
            $yesterday = $now->copy()->subDay();
            $targetDay = $query->first()->updated_at;
            $isExpirted = $targetDay->between($yesterday, $now);
        }

        if ($isExpirted && $isTokenExist) {
            return view('auth/verify');
        } else {
            throw new InvaliedVerifyTokenException();
        };
    }
}
