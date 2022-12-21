<?php

class HikeModel extends Model
{
    public function getHikes(): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM hikes"
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
        //TODO AJOUTER LES TAGS DES HIKES DANS LE FORM ET LES ENVOYER EN DB
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
}