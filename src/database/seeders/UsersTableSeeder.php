<?php

/* ===== Userデータ作成【データ作成テスト】 ===== */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//DBファサード【DB::】を使用するため、宣言
use Illuminate\Support\Facades\DB;

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
        //企業データ作成
        DB::table("companies")->insert([	
            [
                "id" => 1,
                "company_name" => "TEST_COMPANIE"
            ],
        ]);

        //ユーザデータ作成
        DB::table("users")->insert([
            [
                "company_id" => 1, //ここに上で登録した
                "family_name" => "TEST",
                "given_name" => "USER",
                "email" => "test@gmail.com",
                "password" => "pass"
            ],
        ]);
    }
}
