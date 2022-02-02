<?php
//ログイン機能　テスト処理

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use Illuminate\Testing\Fluent\AssertableJson; //追加


class Login extends TestCase
{
	
	use DatabaseTransactions;

	public function setUp(): void
	{
		parent::setUp();
		
		/*===== テストユーザーを登録する =====*/
		$this->user = User::create([
			"name" => "TEST_USER",
			"email" => "auth_test@gmail.com",
			//パスワードハッシュ化させる(bcrypt)
			"password" => bcrypt('auth_test_password'),
		]);
	}

	/*=====　パスワード処理　=====*/
	public function test_正しいパスワードの場合()
	{
		
		$response = $this->get('/login');
		//正常状態を返す(200)
		$response->assertStatus(200);
	
		//ログインする(DBに登録されているユーザを使う)
		$response = $this->post(route('login'), ['email' => "auth_test@gmail.com", 'password' => 'auth_test_password']);
		//ログインが成功したら、302を返す
		$response->assertStatus(302);

		//処理終了後のパス
		$response->assertRedirect('/home');
		//上記のユーザーがログイン認証されているか確認
		$this->assertAuthenticatedAs($this->user);
	}
}
