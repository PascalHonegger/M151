<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 05.04.2016
 * Time: 14:31
 */

require_once "NewEventController.php";
require_once "../controller/CustomSession.php";

$eventName = filter_input(INPUT_POST, 'eventname', FILTER_SANITIZE_STRING) ?? "";
$eventDescription = filter_input(INPUT_POST, 'eventdescription', FILTER_SANITIZE_STRING) ?? "";
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_NUMBER_INT) ?? 0;

if (CustomSession::getInstance()->getCurrentUser()) {
    $controller = new NewEventController();
    $controller->createEvent($eventName, $eventDescription, $location);
} else {
    header('Location: ../Login/RegisterView.php');
}