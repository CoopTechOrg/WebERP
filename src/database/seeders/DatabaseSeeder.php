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
        //callメソッドでUsersTableSeeder呼び出し	
        $this->call(UsersTableSeeder::class);

        //callメソッドでCompaniesTableSeeder呼び出し
        $this->call(CompaniesTableSeeder::class);
    }
}
