<?php

class TagsController
{
    private TagsModel $tagsModel;

    public function __construct()
    {
        $this->tagsModel = new TagsModel();
    }

    public function getTags(): array
    {
        return $this->tagsModel->find();
    }

    public function getTagsNames(int $id): array
    {
        return $this->tagsModel->findTagsNames($id);
    }
}