<?php

//テストユーザー作成

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

//追加
//Userモデルを紐づけ
use App\Models\User;

//Factory使用
use Faker\Factory as Faker;
//Hash使用
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
  
    protected $model = User::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        //テストデータを英語で出力する
        $fakerEn = Faker::create('en_US');
        //テストデータを日本語で出力する
        $fakerJa = Faker::create('ja_JP');


        return [
            'company_id' => rand(1, 10), //企業ID
            'family_name' => $fakerJa->lastName, //名字
            'given_name' => $fakerJa->firstName, //名
            'email' => $fakerEn->unique()->email, //メアド【ランダムでメアド作成】
            'password' => Hash::make("TEST_PASS") //パス【ハッシュ化】
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
