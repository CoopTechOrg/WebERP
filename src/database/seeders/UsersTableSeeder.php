<?php

/* ===== Userデータ作成【データ作成テスト】 ===== */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Userモデルを紐づけ
use App\Models\User;

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

        /***************** ユーザーデータ作成【factory】 *****************/	
        User::factory(10)->create();
    }
}
