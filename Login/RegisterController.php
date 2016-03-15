<?php

require_once "../model/RegisterModel.php";
require_once "../controller/CustomSession.php";

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
     * Register the specified User with the provided data. Will check that the Input is valid before sending it to the database.
     * @param string $username
     * @param string $password
     * @param string $repeatPassword
     * @param string $surname
     * @param string $name
     * @param string $mail
     */
    public function registerPerson(string $username, string $password, string $repeatPassword, string $surname, string $name, string $mail)
    {
        $error = 13;

        $usernameValid = strlen($username) < 40 && strlen($username) > 1;

        $passwordValid = $password == $repeatPassword && preg_match(Register::$passwordRegularExpression, $password);

        $surnameValid = strlen($surname) < 40 && strlen($surname) > 1;

        $nameValid = strlen($name) < 40 && strlen($name) > 1;

        $mailValid = filter_var($mail, FILTER_VALIDATE_EMAIL);

        // No Errors
        if ($usernameValid && $passwordValid && $surnameValid && $nameValid && $mailValid) {

            $insertedUser = $this->model->insert($username, $password, $surname, $name, $mail);

            if($insertedUser)
            {
                $this->session->setCurrentUser($insertedUser);
                header('Location: ../index.php?action=welcome');
                return;
            }

            $error = 126;
        }

        //Some Error Occured
        header('Location: ../index.php?action=register&error=' . $error);
    }
}

//Use FILTER_SANITIZE_EMAIL??

$username = filter_input(INPUT_GET, 'Username', FILTER_SANITIZE_STRING) ?? "";
$name = filter_input(INPUT_GET, 'Name') ?? "";
$surname = filter_input(INPUT_GET, 'Surname') ?? "";
$mail = filter_input(INPUT_GET, 'Mail', FILTER_SANITIZE_EMAIL) ?? "";
$password = filter_input(INPUT_GET, 'Passwort') ?? "";
$repeatPassword = filter_input(INPUT_GET, 'WPasswort') ?? "";

$controller = new Register();

$controller->registerPerson($username, $password, $repeatPassword, $surname, $name, $mail);

//Example Person which exists in Database
//$controller->registerPerson("Mustards", "TollesPasswort!2015", "TollesPasswort!2015", "Hunuggur", "Puscullususus", "BlaBla@Bla.Bla@ballba.com");