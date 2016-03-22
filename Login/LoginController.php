<?php

require_once "../model/LoginModel.php";
require_once "../controller/CustomSession.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 01.03.2016
 * Time: 15:44
 */
class Login
{
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->session = CustomSession::getInstance();
    }

    /**
     * login the specified User with the provided Username / Password
     * @param string $username
     * Used for login
     * @param string $password
     * Used for login
     * @param int $googleAuthCode
     */
    public function loginPerson(string $username, string $password, int $googleAuthCode)
    {
        $user = $this->model->load($username);

        $passwordCorrect = password_verify($password, $user['password']);

        if ($passwordCorrect) {

            $secret = $user['secret'];

            //If Secret is set
            if($secret)
            {
                $authenticator = new PHPGangsta_GoogleAuthenticator();
                $result = $authenticator->verifyCode($user['secret'], $googleAuthCode, 2); // 2 = 2*30sec clock tolerance

                //Entered Code correct
                if($result)
                {
                    $this->saveUser($user);
                    return;
                }
            }

            $this->saveUser($user);
            return;
        }

        //Password or Secret wrong
        $error = 132;
        header('Location: ../index.php?error=' . $error);
    }

    /**
     * Saves the user to the Session and exites the script
     * @param $user
     * The user to save
     */
    public function saveUser($user)
    {
        $this->session->setCurrentUser($user);
        header('Location: ../index.php?action=welcome');
    }
}

$username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING) ?? "";
$password = filter_input(INPUT_POST, 'Password') ?? "";
$authenticationCode = filter_input(INPUT_POST, 'GoogleAuthenticatorCode', FILTER_SANITIZE_NUMBER_INT) ?? 0;

$controller = new Login();

$controller->loginPerson($username, $password, $authenticationCode);

//Example Person which exists in Database
//$controller->loginPerson("Mustards", "TollesPasswort!2015", 0);