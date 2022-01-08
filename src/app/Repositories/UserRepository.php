<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    /**
     * @param array $data
     * @return User
     */
    public function store(User $admin): User
    {
        $admin->save();

        return $admin;
    }
}
