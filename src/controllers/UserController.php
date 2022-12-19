<?php
declare(strict_types=1);
class UserController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function showProfile(): void
    {
        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/profile.view.php';
        include 'views/includes/footer.view.php';
    }
}