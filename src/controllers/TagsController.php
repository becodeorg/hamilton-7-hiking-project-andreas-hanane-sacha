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
}