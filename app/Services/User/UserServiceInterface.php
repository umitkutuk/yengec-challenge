<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data) : User;

    /**
     * @param int $id
     * @return mixed
     */
    public function getUserById(int $id);

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function updateUser(array $data, int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroyUser(int $id);
}
