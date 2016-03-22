<?php

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
}

$newUsername = filter_input(INPUT_POST, 'NewUsername', FILTER_SANITIZE_STRING) ?? "";
$newPassword = filter_input(INPUT_POST, 'NewPassword') ?? "";
$newRepPassword = filter_input(INPUT_POST, 'NewRepPassword') ?? "";
$secret = filter_input(INPUT_POST, 'GoogleSecret') ?? "";
$authenticationCode = filter_input(INPUT_POST, 'GoogleAuthenticatorCode', FILTER_SANITIZE_NUMBER_INT) ?? 0;

$controller = new EditSettingsController();

$controller->loginPerson($username, $password, $authenticationCode);