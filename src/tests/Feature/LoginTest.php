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
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /*===== 処理開始 =====*/
    public function setUp():void
    {
        //セットアップメソッドを実行する。
        parent::setUp();

        //テスト用のダミーユーザの作成
        $this->user = User::create([
            "name" => "auth_test_user",
            "password" => bcrypt('auth_test_password'),
        ]);
    }

   
    /*===== ログイン認証 ======*/
    public function testLogin()
    {
        //現在作成されているユーザで認証のリクエスト
        $response = $this->json('POST', route('/login'),[
            'name' => 'auth_test_user',
            'password' => 'auth_test_password',
        ]);

        //正しいレスポンスが返ってきているのか
        $response->assertStatus(200);

        //data typeチェック
        $response->assertJson(fn (AssertableJson $json) =>
            $json->whereType('success', 'boolean')
            ->whereType('summary', 'string')
            ->whereType('details', 'array')
            ->whereAllType([
                'details.token' => 'string',
            ])
        );

        //テスト用のユーザがログインしているのか確認
        $this->assertAuthenticatedAs($this->user);
    }


    /*===== ログアウト ======*/
    public function testLogout()
    {
       //再度ログインしてtokenを取得する。
       $response = $this->json('POST', route('route.login'),[
           'name' => 'auth_checker',
           'password' => 'auth_test_code',
       ]);
       $token = $response->json('details.token');

       // actingAsで現在認証済みのユーザーを指定
       $response = $this->actingAs($this->user);

       //ログアウト処理
       $response = $this->json('POST', route('/logout'),[
           'Beare Token' => $token,
       ]);

       //正しいレスポンスが返ってきているかどうかを確認。
       $response->assertStatus(200);
    }
}
