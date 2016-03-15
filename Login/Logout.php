<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 15.03.2016
 * Time: 19:55
 */

require_once "../controller/CustomSession.php";

CustomSession::getInstance()->destroySession();

header('Location: ../index.php');