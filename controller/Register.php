<?php

require_once "../model/RegisterModel.php";
require_once "Login.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 01.03.2016
 * Time: 15:44
 */
class Register
{

    private $model;

    public function __construct()
    {
        $this->model = new RegisterModel();
    }

    private static $passwordRegularExpression = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&_-])[A-Za-z\d$@!%*?&_-]{8,}/';

    /**
     * Login the specified User with the provided Username / Password
     * @param $username
     * Used for Login
     * @param $password
     * Used for Login
     */
    public function registerPerson(string $username, string $password)
    {
        $error = 0;

        //TODO Google Authenticator
        /*
        // Google Authenticator is correct
        if (!$ga->verifyCode($googleAuthenticatorSecret, $googleAuthenticatorCode, 2)) {
            $error = 2;
        }
        */

        // Password is correct
        if (!preg_match(Register::$passwordRegularExpression, $password)) {
            $error = 3;
        }

        // Username is correct
        if (strlen($username) >= 40 || strlen($username) <= 1) {
            $error = 4;
        }

        // No Errors
        if ($error == 0) {

            $insertedUser = $this->model->insert($username, $password);

            if($insertedUser)
            {
                Login::saveUser($insertedUser);
                return;
            }

            $error = 126;
        }

        //Some Error Occured
        header('Location: ../index.php?action=register&error=' . $error);
    }
}


$test = new Register();

//Example Person which exists in Database
$test->registerPerson("Serphin", "test");
