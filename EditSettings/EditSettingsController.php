<?php

require_once "../model/EditSettingsModel.php";
require_once "../model/LoginModel.php";
require_once "../model/RegisterModel.php";
require_once "../external/GoogleAuthenticator.php";
require_once "../Login/RegisterController.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 22.03.2016
 * Time: 13:32
 */

/**
 * Controller für das Anpassen der Daten eines Users.
 */
class EditSettingsController
{
    private $model;
    private $loginModel;
    private $session;

    public function __construct()
    {
        $this->model = new EditSettingsModel();
        $this->loginModel = new LoginModel();
        $this->session = CustomSession::getInstance();
    }

    public function updateSettings(string $newUsername, string $newName, string $newSurname, string $newMail, string $newPassword, string $newRepPassword, string $secret, string $authenticatorCode)
    {
        $valuesValid = Register::inputValid($newUsername, $newPassword, $newRepPassword, $newSurname, $newName, $newMail);

        //Password can be empty or must be valid
        $allValid = $valuesValid[0] && ($newPassword == "" || $valuesValid[1]) && $valuesValid[2] && $valuesValid[3] && $valuesValid[4];

        //Authenticator
        $authenticator = new PHPGangsta_GoogleAuthenticator();

        $codeCorrect = $authenticator->verifyCode($secret, $authenticatorCode);

        if($allValid)
        {
            $this->model->update($newUsername, $newName, $newSurname, $newMail, $allValid[1] ? $newPassword : null, $codeCorrect ? $secret : null);

            //Reload User from Database
            $changedUser = $this->loginModel->load($newUsername);
            $this->session->setCurrentUser($changedUser);

            return;
        }

        http_response_code(500);
    }
}