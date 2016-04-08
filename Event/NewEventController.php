<?php

require_once "../controller/CustomSession.php";
require_once "../model/EventModel.php";

/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 16:20
 */

/**
 * Controller für das Erstellen neuer Events
 */
class NewEventController
{
    public function createEvent(string $eventName, string $eventDescription, int $location)
    {
        $session = CustomSession::getInstance();
        $creator = $session->getCurrentUser();
        $userID = $creator['id_person'];
        
        $model = new EventModel();
        $model->createEvent($userID, $eventName, $eventDescription, $location);
    }
}