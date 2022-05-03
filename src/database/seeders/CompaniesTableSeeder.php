<?php

/* ===== Companyデータ作成【データ作成テスト】 ===== */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Companyモデルを紐づけ
use App\Models\Company;

//Factory使用
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /********ダミーデータを作成*********/
    public function run()
    {
        //companyテーブル内のデータ全削除
        Company::truncate();

        /***************** ユーザーデータ作成【factory】 *****************/
        Company::factory(10)->create();
    }
}
