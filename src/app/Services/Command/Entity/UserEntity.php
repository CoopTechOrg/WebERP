<?php

namespace App\Services\Command\Entity;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Exceptions\ORMNotFoundException;

class UserEntity extends Entity
{
    private ?User $user;

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    public function getModel(): User
    {
        return $this->user;
    }

    public static function getInstance(?int $id = null): self
    {
        $entity = new self();
        $entity->id = $id;

        $entity->getDefaultModel();

        return $entity;
    }

    public static function new(): self
    {
        return self::getInstance();
    }

    public static function find(int $id): self
    {
        return self::getInstance($id);
    }

    protected function getDefaultModel(): void
    {
        $this->user = $this->id === null ? new User() : $this->userRepository->select($this->id);
        if($this->user === null) {
            throw new ORMNotFoundException();
        }
    }
}