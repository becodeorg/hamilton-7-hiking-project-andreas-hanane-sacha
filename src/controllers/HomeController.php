<?php

class HomeController
{
    private HikeController $hikeController;
    private TagsController $tagsController;

    public function __construct()
    {
        $this->hikeController = new HikeController();
        $this->tagsController = new TagsController();
    }

    public function index(): void
    {
        $hikes = $this->hikeController->getHikesList();
        $tags = $this->tagsController->getTags();

        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/hikeList.view.php';
        include 'views/includes/footer.view.php';
    }
}