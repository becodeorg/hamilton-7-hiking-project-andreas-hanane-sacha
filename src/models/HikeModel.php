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
}