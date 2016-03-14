<?php

require_once "../model/LoginModel.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 01.03.2016
 * Time: 15:44
 */
class Login
{
    private $model;

    public function __construct()
    {
        $this->model = new LoginModel();
    }

    /**
     * Login the specified User with the provided Username / Password
     * @param $username
     * Used for Login
     * @param $password
     * Used for Login
     */
    public function loginPerson(string $username, string $password, string $googleAuthCode)
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
                if(!$result)
                {
                    return;
                }
            }

            $this->saveUser($user);
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
    public static function saveUser($user)
    {
        $_SESSION['CurrentUser'] = $user;
        header('Location: ../index.php?action=welcome');
    }
}


$test = new Login();

//Example Person which exists in Database
$test->loginPerson("Serphin", "test", "12345");

//Should be something like:
//
//loginPerson($enteredUserName, $enterPassword (IF Equal to RepeatedPassword), $googleAuthCode (Optional));