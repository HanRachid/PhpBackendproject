<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;

class UserRepository extends AbstractRepository implements UserRepositoryContract
{
    public function listUser(): array
    {
        $sql = <<<SQL
SELECT name, email, password 
FROM user
SQL;
        $rows = $this->db
            ->run($sql)
            ->fetchAll();

        return array_map(fn (array $row) => $this->userFromRow($row), $rows);
    }

    public function addUser(string $name, string $email, string $password): int
    {
        $sql = <<<SQL
INSERT INTO user (name, email, password) 
VALUES(?, ?, ?)
SQL;

        $this->db
            ->run($sql, [
               $name,$email,$password
            ]);
        return $this->db->lastInsertId();
    }

    public function deleteUser(string $email)
    {
        $sql = <<<SQL
DELETE FROM user 
WHERE email = ?
SQL;

        return $this->db
            ->run($sql, [
                $email
            ])->rowCount();
    }

    private function userFromRow(array $row): User
    {
        return new User(
            $row['name'],
            $row['email'],
            $row['password']
        );
    }
}
