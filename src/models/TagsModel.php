<?php

class TagsModel extends Model
{
    public function find(): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM tags"
        );

        if (!$stmt) {
            throw new Exception("Failed to fetch the tags data.");
            return false;
        }

        return $stmt->fetchAll();
    }
}