<?php

namespace Database\Seeders;

use App\Core\Hash;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::truncate();
        User::factory(10)->create();

        /**
         * @var Company $company
         */
        $company = Company::inRandomOrder()->first();

        $admin = new User();
        $admin->email = env('ADMINISTRATOR_EMAIL');
        $admin->company_id = $company->id;
        $admin->family_name = "開発";
        $admin->given_name = "責任者";
        $admin->password = Hash::make(env('ADMINISTRATOR_PASS'));
        $admin->save();
    }
}
