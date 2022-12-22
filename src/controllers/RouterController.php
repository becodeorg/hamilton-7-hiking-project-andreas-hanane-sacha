<?php

class RouterController
{
    private TagsController $tagsController;
    private UserController $userController;
    private AuthController $authController;
    private ErrorController $errorController;
    private HikeController $hikeController;
    private HomeController $homeController;

    public function __construct()
    {
        $this->errorController = new ErrorController();
        $this->tagsController = new TagsController();
        $this->userController = new UserController();
        $this->authController = new AuthController();
        $this->hikeController = new HikeController();
        $this->homeController = new HomeController();
    }

    public function home():void
    {
        $this->homeController->index();
    }

    public function registration(string $method):void
    {
        switch ($method){
            case 'GET':
                $this->authController->showRegistrationForm();
                break;
            case 'POST':
                try {
                    $this->authController->register($_POST);
                } catch (Exception $e) {
                    $this->errorController->showError($e->getMessage(), 'views/registrationForm.view.php');
                }
                break;
            default:
                $this->errorController->showError("Request denied");
        }
    }

    public function profil(string $method):void
    {
        if(!$_SESSION['user']['loggedIn']){
            $this->login($method);
        }else {
            $id = intval($_SESSION['user']['id']);

            switch ($method) {
                case 'GET':
                    $this->userController->showProfile($id);
                    break;
                case 'POST':
                    switch ($_POST['update']) {
                        case "change":
                            $this->userController->showProfile($id);
                            break;
                        case "update":
                            try {
                                $this->userController->updateProfile($_POST);
                            } catch (Exception $e) {
                                $this->errorController->showError($e->getMessage());
                            }
                            break;
                        case "delete":
                            try {
                                $this->userController->deleteProfile();
                            } catch (Exception $e) {
                                $this->errorController->showError($e->getMessage());
                            }
                            break;
                        default:
                            $this->userController->showProfile($id);
                    }
                    break;
                default:
                    $this->errorController->showError("Request denied");
            }
        }
    }

    public function login(string $method):void
    {
        switch ($method){
            case 'GET':
                $this->authController->showLoginForm();
                break;
            case 'POST':
                try {
                    $this->authController->login($_POST);
                } catch (Exception $e) {
                    $this->errorController->showError($e->getMessage());
                }
                break;
            default:
                $this->errorController->showError("Request denied");
        }
    }

    public function logout():void
    {
        $this->authController->logout();
    }

    public function singleHike(string $method):void
    {
        $id = intval($_GET['id']);
        switch ($method) {
            case 'GET':
                $this->hikeController->showSingleHike($id);
                break;
            case 'POST':
                switch ($_POST['update']) {
                    case "change":
                        $this->hikeController->showSingleHike($id);
                        break;
                    case "update":
                        try {
                            $this->hikeController->updateHike($_POST, $id);
                        } catch (Exception $e) {
                            $this->errorController->showError($e->getMessage());
                        }
                        break;
                    case "delete":
                        try {
                            $this->hikeController->deleteHike($id);
                        } catch (Exception $e) {
                            $this->errorController->showError($e->getMessage());
                        }
                        break;
                    default:
                        $this->hikeController->showSingleHike($id);
                }
                break;

            default:
                $this->errorController->showError("Bad request");
        }
    }

    public function newHike(string $method):void
    {
        switch ($method){
            case 'GET':
                $this->hikeController->showNewHikeForm();
                break;
            case 'POST':
                try {
                    $this->hikeController->addHike($_POST);
                } catch (Exception $e) {
                    $this->errorController->showError($e->getMessage());
                }
                break;
            default:
                $this->errorController->showError("Bad request");
        }
    }

    public function router():void
    {
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($url){
            case "":
                $this->home();
                break;
            case 'registration':
                $this->registration($method);
                break;
            case 'profil':
                $this->profil($method);
                break;
            case 'login':
                $this->login($method);
                break;
            case 'logout':
                $this->logout();
                break;
            case 'singleHike':
                $this->singleHike($method);
                break;
            case 'newHike':
                $this->newHike($method);
                break;
            default:
                $this->errorController->showError("404 page not found");
        }

    }
}