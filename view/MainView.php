<!DOCTYPE html>

<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 01.03.2016
 * Time: 16:08
 */

require_once "../controller/CustomSession.php";

?>

<html>
    <head>
        <title>Shareloc - Share your Location now!</title>
        <link rel="stylesheet" href="../css/Style.css">
    </head>
    <body>
    <div id="mainDiv">

        <?php include "Header.php"; ?>

        <div id="content">
            <?php

            $session = CustomSession::getInstance();

            echo $session->getCurrentUser()['id'];
            ?>
        </div>

        <div id="contentNavigation">

        </div>

        <?php include "Footer.php"; ?>

    </div>
    </body>
</html>
