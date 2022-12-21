<?php

class UserModel extends Model
{
    /**
     * @throws Exception
     */
    public function getId():int
    {
        $id = $this->query(
            "select `id` from `users` where `nickname` = ?",
            [
                $_SESSION['user']['nickname']
            ]
        )->fetch();

        if (!$id) {
            throw new Exception('Failed connection attempt : connection error.');
        }
        return $id['id'];
    }

    /**
     * @throws Exception
     */
    public function update(string $nickname, string $firstname, string $lastname, string $email, int $id): void
    {
        if (!$this->query(
            "UPDATE `users` SET `nickname`= ?,`firstname`= ?,`lastname`= ?,`email`= ? WHERE `id` = ?",
            [
                $nickname,
                $firstname,
                $lastname,
                $email,
                $id
            ]
        )) {
            throw new Exception('Error during registration.');
        }
    }

    /**
     * @throws Exception
     */
    public function deleteUser(int $id):void
    {
        if (!$this->query(
            "DELETE FROM `users` WHERE `id`= ?",
            [
                $id
            ]
        )) {
            throw new Exception('Error during deletion.');
        }
    }

    public function findUser(int $id): array
    {
        $stmt = $this->query(
            "SELECT * FROM users WHERE id = ?",
            [
                $id
            ]
        );

        if (!$stmt) {
            throw new Exception('Error during finding user.');
        }

        return $stmt->fetch();
    }
}