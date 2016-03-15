<?php

require_once "../model/RegisterModel.php";
require_once "CustomSession.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 01.03.2016
 * Time: 15:44
 */
class Register
{

    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new RegisterModel();
        $this->session = CustomSession::getInstance();
    }

    private static $passwordRegularExpression = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&_-])[A-Za-z\d$@!%*?&_-]{8,}/';

    /**
     * Login the specified User with the provided Username / Password
     * @param string $username
     * Used for Login
     * @param string $password
     * Used for Login
     * @param string $surname
     * Used for Login
     * @param string $name
     * Used for Login
     * @param string $mail
     * Used for Login.
     */
    public function registerPerson(string $username, string $password, string $surname, string $name, string $mail)
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

        //TODO Mail

        // No Errors
        if ($error == 0) {

            $insertedUser = $this->model->insert($username, $password, $surname, $name, $mail);

            var_dump($insertedUser);
            if($insertedUser)
            {
                $this->session->setCurrentUser($insertedUser);
                header('Location: ../index.php?action=welcome');
                return;
            }

            $error = 126;
        }

        //Some Error Occured
        //header('Location: ../index.php?action=register&error=' . $error);
    }
}


$test = new Register();

//Example Person which exists in Database
$test->registerPerson("Mustards", "TollesPasswort!2015", "Hunuggur", "Puscullususus", "BlaBla@Bla.Bla@ballba.com");
