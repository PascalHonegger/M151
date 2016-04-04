<?php

require_once "../controller/CustomSession.php";

/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 16:20
 */
class NewEventController
{

}

if(CustomSession::getInstance()->getCurrentUser())
{
    $controller = new NewEventController();
}
else
{
    header('Location: Login/RegisterView.php');
}


