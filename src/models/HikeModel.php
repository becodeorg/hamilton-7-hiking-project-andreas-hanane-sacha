<?php

class HikeModel extends Model
{
    public function getHikes(): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM hikes ORDER BY date_creation DESC"
        );

        if (!$stmt) {
            throw new Exception("Failed to fetch the hikes data.");
        }

        return $stmt->fetchAll();
    }

    public function getTags($id): array
    {
        $stmt = $this->query(
            "SELECT t.name
                    FROM tags t
                    JOIN tags_hikes_links thl ON t.id = thl.id_tag
                    JOIN hikes h ON h.id = thl.id_hike
                    WHERE h.id = ?",
            [
                $id
            ]
        );

        if (!$stmt) {
            throw new Exception("Failed to fetch the hikes tags.");
        }

        return $stmt->fetchAll();
    }

    public function getHike(int $id): array
    {
        $stmt = $this->query(
            "SELECT * FROM hikes WHERE id = ?",
            [
                $id
            ]
        );

        if (!$stmt) {
            throw new Exception("Failed to fetch the hike.");
        }

        return $stmt->fetch();
    }

    public function create(string $name, string $distance, string $duration, string $elevation_gain, string $description): void
    {
        if (!$this->query(
            "INSERT INTO hikes(id_user, name, date_creation, distance, duration, elevation_gain, description) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $_SESSION['user']['id'],
                $name,
                date('Y-m-d'),
                $distance,
                $duration,
                $elevation_gain,
                $description
            ]
        )) {
            throw new Exception("Failed to add a hike.");
        }
    }

    public function linkTags(string $id_tag, string $id_hike): void
    {
        if (!$this->query(
            "INSERT INTO tags_hikes_links(id_tag, id_hike) VALUES(?, ?)",
            [
                $id_tag,
                $id_hike
            ]
        )) {
            throw new Exception("Failed to link the tag and the hike");
        }
    }

    /*
     * update the hike
     */
    public function update(int $id, string $name, string $distance, string $duration, string $elevation_gain, string $description): void
    {
        //"UPDATE `users` SET `nickname`= ?,`firstname`= ?,`lastname`= ?,`email`= ? WHERE `id` = ?"
        if (!$this->query(
            "UPDATE `hikes` SET `name` = ?, `distance` = ?,`duration` = ?,`elevation_gain` = ?, `description`= ?, `isUpdated` = ? WHERE `id` = ?",
            [
                $name,
                $distance,
                $duration,
                $elevation_gain,
                $description,
                date('Y-m-d'),
                $id
            ]
        )) {
            throw new Exception('Error during hike updating.');
        }
    }

    /*
     * delete the hike
     */
    public function delete(int $id):void
    {
        if (!$this->query(
            "DELETE FROM `hikes` WHERE `id`= ?",
            [
                $id
            ]
        )) {
            throw new Exception('Error during hike deletion.');
        }
    }

    public function deleteTags(int $id): void
    {
        if (!$this->query(
            "DELETE FROM `tags_hikes_links` WHERE `id_hike` = ?",
            [
                $id
            ]
        )) {
            throw new Exception("Error during hike tag deletion.");
        }
    }

    public function getUserHikes(int $id_user): void
    {
        $stmt = $this->query(
            "SELECT * FROM hikes WHERE id_user = ?",
            [
                $id_user
            ]
        );

        if (!stmt) {
            throw new Exception();
        }
    }
}