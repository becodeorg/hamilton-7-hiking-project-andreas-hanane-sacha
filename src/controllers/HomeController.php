<?php

class HomeController
{
    private TagsController $tagsController;

    public function __construct()
    {
        $this->tagsController = new TagsController();
    }

    public function index(): void
    {
        global $url;

        $hikeController = new HikeController();

        $hikes = $hikeController->getHikesList();
        $tags = $this->tagsController->getTags();

        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/hikeList.view.php';
        include 'views/includes/footer.view.php';
    }
}