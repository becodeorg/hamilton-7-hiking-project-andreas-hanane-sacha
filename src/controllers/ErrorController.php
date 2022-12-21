<?php

class ErrorController
{
    public function showError(string $errorMsg="Mistakes have been made", string $viewToInclude =""): void
    {
        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/errorPages/errorPage.php';
        include $viewToInclude;
        include 'views/includes/footer.view.php';
    }
}