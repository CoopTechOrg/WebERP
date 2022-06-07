<?php

namespace App\Repositories;

use App\Models\User;
use App\Core\Database\Builer\SaveModelTrait;
use App\Core\Database\Builer\SelectModelTrait;

class UserRepository extends Repository
{

    use SelectModelTrait;
    use SaveModelTrait;

    /**
     * @param array $data
     * @return User
     */
    public function store(User $admin): User
    {
        $admin->save();

        return $admin;
    }

    public function modelClass(): string
    {
        return User::class;
    }
}
