<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:20
 */

include_once "controller/CustomSession.php";

$session = CustomSession::getInstance();
if($session->getCurrentUser())
{
    header('Location: /home/home.php');
}
else
{
    header('Location: login/login.php');
}
?>

<meta charset="utf-8"/>

