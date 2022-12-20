<?php
declare(strict_types=1);

class AuthModel extends Model
{
    public function create(string $nickname, string $firstname, string $lastname, string $email, string $password): void
    {
        if (!$this->query(
            "INSERT INTO users(nickname, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)",
            [
                $nickname,
                $firstname,
                $lastname,
                $email,
                $password
            ]
        )) {
            throw new Exception('Error during registration.');
        }
    }

    public function find(string $nickname): array
    {
        $user = $this->query(
            "SELECT * FROM users WHERE nickname = ?",
            [
                $nickname
            ]
        )->fetch();

        if (!$user) {
            throw new Exception('Failed login attempt : connection error.');
        }

        return $user;
    }
}