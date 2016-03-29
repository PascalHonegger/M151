<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 15.03.2016
 * Time: 19:52
 */

require_once "../controller/CustomSession.php";

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Shareloc - Share your Location now!</title>
        <link rel="stylesheet" href="../css/Style.css">
    </head>
    <body>
        <div id="MainDiv">
            <?php include "Header.php";

            require_once "content.php";

            require_once "contentmenu.php";

            require_once "Footer.php"; ?>
        </div>
    </body>
</html>
