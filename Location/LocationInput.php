<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 29.03.2016
 * Time: 15:15
 */

require_once "../controller/CustomSession.php";
require_once "LocationController.php";

$session = CustomSession::getInstance();


$creator = $session->getCurrentUser();
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) ?? "";
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) ?? "";
$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING) ?? "";

$Location = new Location();
$Location->createLocation($creator['id_person'], $name, $description, $position);