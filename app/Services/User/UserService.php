<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var \App\Repositories\User\UserRepositoryInterface
     */
    public $userRepository;

    /**
     * UserService constructor.
     * @param \App\Repositories\User\UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function createUser(array $data): User
    {
        $user = $this->userRepository->create($data);

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function getUserById(int $id): User
    {
        return $this->userRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateUser(array $data, int $id) : User
    {
        $user = $this->userRepository->update($data, $id);

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function destroyUser(int $id) : User
    {
        $user = $this->userRepository->destroy($id);

        return $user;
    }
}
