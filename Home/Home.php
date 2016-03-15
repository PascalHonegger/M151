<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 15.03.2016
 * Time: 19:52
 */

require_once "../controller/CustomSession.php";

$session = CustomSession::getInstance();

var_dump($session->getCurrentUser());

?>



<button onclick="window.location.replace('../Login/Logout.php')">Logöüt</button>
