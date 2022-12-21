<?php

class ErrorController
{
    public function showError(string $errorMsg="Mistakes have been made"): void
    {
        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/errorPages/errorPage.php';
        include 'views/includes/footer.view.php';
    }
}