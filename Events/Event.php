<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 15.03.2016
 * Time: 19:52
 */

require_once "../controller/CustomSession.php";


if (!CustomSession::getInstance()->getCurrentUser()) {
    header('Location: ../Login/RegisterView.php');
}

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Shareloc - Share your Location now!</title>
        <link rel="stylesheet" href="../css/Style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="../Location/CreateLocationScript.js"></script>
    </head>
    <body>
        <div id="MainDiv">
            <?php

                include "../Discover/DiscoverHeader.php";

                $location = filter_input(INPUT_GET, 'loc');

                require_once "content.php";

                require_once "contentmenu.php";

                require_once "../home/Footer.php";
            ?>
        </div>
    </body>
</html>
