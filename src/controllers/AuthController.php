<?php
declare(strict_types=1);

class AuthController
{
    private AuthModel $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function register(array $input): void
    {
        if (empty($input['nickname']) || empty($input['firstname']) || empty($input['lastname']) || empty($input['email']) || empty($input['password'])) {
            throw new Exception('Form data not validated.');
        }

        $nickname = htmlspecialchars($input['nickname']);
        $firstname = htmlspecialchars($input['firstname']);
        $lastname = htmlspecialchars($input['lastname']);
        $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($input['password'], PASSWORD_DEFAULT);

        $this->authModel->create($nickname, $firstname, $lastname, $email, $password);

        $id = $this->authModel->getLastInsertId();

        $_SESSION['user'] = [
            'id' => $id,
            'nickname' => $nickname,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'loggedIn' => true
        ];

        http_response_code(302);
        header('location: /');
    }

    public function logout(): void
    {
        unset($_SESSION['user']);

        header('location: /');
    }

    public function showRegistrationForm(): void
    {
        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/registrationForm.view.php';
        include 'views/includes/footer.view.php';
    }
}