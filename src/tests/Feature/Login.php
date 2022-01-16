<!--　ログイン機能　テスト部　-->
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\User;
use Auth;


class Login extends TestCase
{
    //DBリセット    
　　//use RefreshDatabase;

　　/**
     * A basic feature test example.
     *
     * @return void
     */
    
    /*======= ログインテスト =======*/
    public function TestLogin()
    {
 	//テストユーザー作成【UserFactory】
    	$user = factory(User::class)->create();

        //認証されていないことを確認
        $this->assertGuest();

        // ログインを実行 後日実装
        /*$response = $this->post('home', [
		'email'    => $user->email,
		'password' => $user->password, 
        ]);*/


        // 認証されていることを確認
        $this->assertAuthenticated();

        // ログイン後にリダイレクトされるのを確認
        $response->assertRedirect('/home');

    }
}
