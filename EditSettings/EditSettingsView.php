<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 22.03.2016
 * Time: 15:09
 */

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Shareloc - Share your Location now!</title>
        <link rel="stylesheet" href="../css/Style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="EditSettingsScript.js"></script>
    </head>
    <body>
        <div id="MainDiv">
            <?php
            require_once "Header.php";

            require_once "content.php";

            require_once "../Home/contentmenu.php";

            require_once "../Home/Footer.php"; ?>
        </div>
    </body>
</html>
