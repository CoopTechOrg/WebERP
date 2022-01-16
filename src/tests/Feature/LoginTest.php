<?php
//ログイン機能　テスト処理

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use Illuminate\Testing\Fluent\AssertableJson; //追加

class Login extends TestCase
{
    //use DatabaseTransactions;

    public function test_example()
    {
	//テスト環境確認
	dump(env("DB_DATABASE"));
        dump(env("APP_ENV"));
        dump(env("DB_HOST"));
        dump(env("DB_USERNAME"));
        dump(env("DB_PASSWORD"));
	
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /*===== テストユーザーを登録する =====*/
    public function test_insertuser()
    {
        //テストユーザの作成[UserFactory.phpに紐づけ]
        $this->user = User::create([
	    "name" => "管理者",
            "email" => "auth_test@gmail.com",
	    //パスワード暗号化させる(bcrypt)
            "password" => bcrypt('auth_test_password'),
        ]);
    }

}
