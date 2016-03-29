<?php

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 29.03.2016
 * Time: 15:13
 */
require_once "EditSettingsController.php";

$newUsername = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING) ?? "";
$newName = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING) ?? "";
$newSurname = filter_input(INPUT_POST, 'Surname', FILTER_SANITIZE_STRING) ?? "";
$newMail = filter_input(INPUT_POST, 'Mail', FILTER_SANITIZE_STRING) ?? "";
$newPassword = filter_input(INPUT_POST, 'Password') ?? "";
$newRepPassword = filter_input(INPUT_POST, 'RepPassword') ?? "";
$authenticationCode = filter_input(INPUT_POST, 'GoogleAuthenticatorCode', FILTER_SANITIZE_NUMBER_INT) ?? 0;
$secret = filter_input(INPUT_POST, 'GoogleAuthenticatorSecret') ?? "";

$controller = new EditSettingsController();

$controller->updateSettings($newUsername, $newName, $newSurname, $newMail, $newPassword, $newRepPassword, $secret, $authenticationCode );