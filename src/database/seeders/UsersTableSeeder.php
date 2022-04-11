<?php

/* ===== Userデータ作成【データ作成テスト】 ===== */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Userモデルを紐づけ
use App\Models\User;
//Companyモデルを紐づけ
use App\Models\Company;

//Factory使用
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	
    /********ダミーデータを作成*********/
    public function run()
    {
	//userテーブル内のデータ全削除
	User::truncate();
	//companyテーブル内のデータ全削除
	Company::truncate();
	
	//テストデータを英語で出力する
	$faker_En = Faker::create('en_US');	
	//テストデータを日本語で出力する
        $faker_Ja = Faker::create('ja_JP');
	
	//iに値を入れ、その数分テストデータ作成
	for($i = 0; $i < 10; $i++){
            $ID = $i + 1;							//ID値作成
            /***************** ユーザデータ作成 *****************/
            User::create([
		'company_id' => $ID,						//企業ID
                'family_name' => $faker_Ja->lastName,				//名字
		'given_name' => $faker_Ja->firstName,				//名
                'email' => $faker_En->unique()->email,				//メアド【ランダムでメアド作成】
                'password' => password_hash("TEST_PASS", PASSWORD_DEFAULT)	//パス【ハッシュ化】
            ]);
            /***************** 企業データ作成 *****************/
            Company::create([
                'company_name' => $faker_Ja->unique()->company			//企業名【unique()ダブったデータを作成しない】
            ]);
        }
    }
}
