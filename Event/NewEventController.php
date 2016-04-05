<?php

require_once "../controller/CustomSession.php";
require_once "../model/EventModel.php";

/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 16:20
 */
class NewEventController
{
    public function createEvent()
    {
        $eventName = $_POST['eventname'];
        $eventDescription = $_POST['eventdescription'];
        $locaion = $_POST['location'];

        $session = CustomSession::getInstance();
        $creator = $session->getCurrentUser();
        $userID = $creator['id_person'];
        
        $model = new EventModel();
        $model->createEvent($userID,$eventName,$eventDescription,$locaion);
    }
}
if(CustomSession::getInstance()->getCurrentUser())
{
    $controller = new NewEventController();
    $controller->createEvent();
}
else
{
    header('Location: Login/RegisterView.php');
}


