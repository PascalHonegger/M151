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

    public function updateSettings(string $newUsername, string $newName, string $newSurname, string $newMail, string $newPassword, string $newRepPassword, string $secret, string $googleAuthenticatorCode)
    {
        $valuesValid = Register::InputValid($newUsername, $newPassword, $newRepPassword, $newSurname, $newName, $newMail);

        $allValid = $valuesValid[0] && $valuesValid[2] && $valuesValid[3] && $valuesValid[4];

        //Authenticator
        $ga = new PHPGangsta_GoogleAuthenticator();

        $codeCorrect = $ga->verifyCode($secret, $googleAuthenticatorCode);

        if($allValid)
        {
            $this->model->update($newUsername, $newName, $newSurname, $newMail, $allValid[1] ? $newPassword : null, $codeCorrect ? $secret : null);
        }

        //Reload User from Database
        $changedUser = $this->loginModel->load($newUsername);
        $this->session->setCurrentUser($changedUser);

        header('Location: EditSettingsView.php');
    }
}