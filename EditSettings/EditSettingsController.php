<?php

require_once "../model/EditSettingsModel.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 22.03.2016
 * Time: 13:32
 */
class EditSettingsController
{
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new EditSettingsModel();
        $this->session = CustomSession::getInstance();
    }

    public function updateSettings(string $newUsername, string $newName, string $newSurname, string $newMail, string $newPassword, string $newRepPassword, string $secret, string $googleAuthenticatorCode)
    {
        $this->model->update($newUsername, $newName, $newSurname, $newMail, $newPassword, $secret);
    }
}

$newUsername = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING) ?? "";
$newName = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING) ?? "";
$newSurname = filter_input(INPUT_POST, 'Surname', FILTER_SANITIZE_STRING) ?? "";
$newMail = filter_input(INPUT_POST, 'Mail', FILTER_SANITIZE_STRING) ?? "";
$newPassword = filter_input(INPUT_POST, 'Password') ?? "";
$newRepPassword = filter_input(INPUT_POST, 'RepPassword') ?? "";
$authenticationCode = filter_input(INPUT_POST, 'GoogleAuthenticatorCode', FILTER_SANITIZE_NUMBER_INT) ?? 0;
$secret = filter_input(INPUT_POST, 'GoogleAuthenticatorSecret') ?? "";

$controller = new EditSettingsController();

$controller->updateSettings($newUsername, $newName, $newSurname, $newMail, $newPassword, $newRepPassword, $authenticationCode, $secret );