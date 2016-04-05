<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 29.03.2016
 * Time: 15:11
 */

require_once "DiscoverController.php";

$username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING) ?? "";
$password = filter_input(INPUT_POST, 'Password') ?? "";
$authenticationCode = filter_input(INPUT_POST, 'GoogleAuthenticatorCode', FILTER_SANITIZE_NUMBER_INT) ?? 0;

$controller = new Login();

$controller->loginPerson($username, $password, $authenticationCode);