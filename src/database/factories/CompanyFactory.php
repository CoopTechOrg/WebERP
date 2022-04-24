<?php

//テスト企業作成

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

//追加
//Companyモデルを紐づけ
use App\Models\Company;

//Factory使用
use Faker\Factory as Faker;

class CompanyFactory extends Factory
{

    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        //テストデータを日本語で出力する
        $faker_Ja = Faker::create('ja_JP');

        return [
            'company_name' => $faker_Ja->unique()->company		//企業名
        ];
    }
}
