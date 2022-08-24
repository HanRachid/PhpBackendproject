<?php

namespace App\Repositories\Contracts;

use App\Classes\User;

interface UserRepositoryContract
{
    /**
     * Get User list
     *
     * @return User[]
     */
    public function listUser(): array;

    /**
     * Add a User
     *
     * @param string $title
     * @param string $body
     * @return int
     */
    public function addUser(string $name, string $email, string $password): int;

    /**
     * Delete a User and attached comments
     *
     * @param int $id
     * @return int
     */
    public function deleteUser(string $email);
}
