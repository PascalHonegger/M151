<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:20
 */

include_once "controller/CustomSession.php";

if(CustomSession::getInstance()->getCurrentUser())
{
    header('Location: Home/Home.php');
}
else
{
    header('Location: Login/RegisterView.php');
}
?>

<meta charset="utf-8"/>