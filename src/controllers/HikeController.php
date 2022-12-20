<?php
declare(strict_types=1);

class HikeController
{
    private HikeModel $hikeModel;
    private TagsController $tagsController;

    public function __construct()
    {
        $this->hikeModel = new HikeModel();
        $this->tagsController = new TagsController();
    }

    public function getHikesList(): array
    {
        $hikes = $this->hikeModel->getHikes();

        for ($i = 0; $i < count($hikes); $i++) {
            $tags = $this->hikeModel->getTags($hikes[$i]['id']);
            $hikes[$i]['tags'] = [];

            for ($j = 0; $j < count($tags); $j++) {
                array_push($hikes[$i]['tags'], $tags[$j]['name']);
            }
        }

        return $hikes;
    }
}