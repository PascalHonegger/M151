<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:01
 */

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/Style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="RegisterScript.js"></script>
    </head>
    <body>
        <div id="MainDiv">

            <?php
                require_once "RegisterHeader.php";

                require_once "RegisterContent.php";

            require_once "../Home/Footer.php"
            ?>

        </div>
    </body>
</html>

