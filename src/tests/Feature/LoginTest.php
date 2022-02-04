<?php
//ログイン機能　テスト処理

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use Illuminate\Testing\Fluent\AssertableJson; //追加


class LoginTest extends TestCase
{
    /*===== 処理終了後、登録したテストユーザーを削除する =====*/
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

    /*=====　ログイン処理【成功時】　=====*/
    public function test_正しいパスワードの場合()
    {
		
        $response = $this->get('/login');
        //正常状態を返す(200)
        $response->assertStatus(200);

        //ログインする(DBに登録されているユーザを使う)
        $response = $this->post(route('login'), ['email' => "auth_test@gmail.com", 'password' => 'auth_test_password']);
        //リダイレクトを行うため、302を返す
        $response->assertStatus(302);

        //処理終了後のパス
        $response->assertRedirect('/home');
        //上記のユーザーがログイン認証されているか確認
        $this->assertAuthenticatedAs($this->user);
    }
	
    /*=====　ログイン処理【失敗時】　=====*/
    public function test_謝ったパスワードの場合()
    {
        $response = $this->get('/login');
        //正常状態を返す(200)
        $response->assertStatus(200);

        //ログインする(パスワードは謝ったものを渡す)
        $response = $this->post(route('login'), ['email' => "auth_test@gmail.com", 'password' => 'XXXXXXXXXXXXXXX']);
        //リダイレクトを行うため、302を返す
        $response->assertStatus(302);
	
        //リダイレクト後は、ログインページに戻る
        $response->assertRedirect('/login');
        //失敗しているので認証されていないメソッドを渡す
        $this->assertGuest();
    }

    /*=====　ログアウト処理 =====*/
    public function test_ログアウト処理()
    {
        //登録したユーザーをログイン状態の作成
        $response = $this->actingAs($this->user);
        //ログイン完了後の画面へ移動
        $response = $this->get('/home');
        //正常状態を返す
        $response->assertStatus(200);

        //ログアウト処理実施
        $this->post('logout');
        //ログアウト正常終了したら200を返す
        $response->assertStatus(200);
        //ログインページに移動
        $response = $this->get('/login');
        //移動出来たら正常状態を返す
        $response->assertStatus(200);

        //ログインしていないので、認証されていないことを確認
        $this->assertGuest(); 
    }
}
