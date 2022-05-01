<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //callメソッドでクラス呼び出し	
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
    }
}
