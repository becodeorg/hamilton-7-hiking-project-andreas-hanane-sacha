<?php
declare(strict_types=1);
class UserController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * @throws Exception
     */
    public function updateProfile($input): void
    {
        if (empty($input['nickname']) || empty($input['firstname']) || empty($input['lastname']) || empty($input['email'])) {
            throw new Exception('Form data not validated.');
        }

        $nickname = htmlspecialchars($input['nickname']);
        $firstname = htmlspecialchars($input['firstname']);
        $lastname = htmlspecialchars($input['lastname']);
        $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $this->userModel->update($nickname, $firstname, $lastname, $email, $this->userModel->getId());
        $_SESSION['user'] = [
            'nickname' => $nickname,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'loggedIn' => true
        ];

        http_response_code(302);
        header('location: /profil');

    }

    /**
     * @throws Exception
     */
    public function deleteProfile():void
    {
        $this->userModel->deleteUser($this->userModel->getId());
        http_response_code(302);
        header('location: /logout');
    }
    public function showProfile(): void
    {
        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/profile.view.php';
        include 'views/includes/footer.view.php';
    }
}