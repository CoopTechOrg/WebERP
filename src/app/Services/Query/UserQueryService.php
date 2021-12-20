<?php

namespace App\Services\Query;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserQueryService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return User
     */
    public function createAdminUser(array $data): User
    {
        // todo: ここで管理者権限など設定する
        $values = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

        $admin = new User();
        $admin->fill($values);
        return $this->userRepository->store($admin);
    }
}
