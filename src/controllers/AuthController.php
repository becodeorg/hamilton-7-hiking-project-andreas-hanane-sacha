<?php
declare(strict_types=1);

class AuthController
{
    private AuthModel $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function showRegistrationForm(): void
    {
        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/registrationForm.view.php';
        include 'views/includes/footer.view.php';
    }
}