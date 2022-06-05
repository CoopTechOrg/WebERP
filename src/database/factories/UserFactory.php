<?php

//テストユーザー作成

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

//追加
//Userモデルを紐づけ

//Factory使用

//Hash使用

class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        //テストデータを英語で出力する
        $fakerEn = Faker::create('en_US');
        //テストデータを日本語で出力する
        $fakerJa = Faker::create('ja_JP');

        /**
         * @var Company $company
         */
        $company = Company::inRandomOrder()->first();

        return [
            'company_id' => $company->id,
            'family_name' => $fakerJa->lastName, //名字
            'given_name' => $fakerJa->firstName, //名
            'email' => $fakerEn->unique()->email,
            'password' => Hash::make("TEST_PASS")
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
