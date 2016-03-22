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
<!DOCTYPE html>

<?php

require_once "../controller/CustomSession.php";

?>

<html>
<head>
    <title>Shareloc - Share your Location now!</title>
    <link rel="stylesheet" href="../css/Style.css">
</head>
<body>
<div id="MainDiv">

    <?php include "Header.php";

    include "content.php";

    include "contentmenu.php";

    include "Footer.php"; ?>

</div>
</body>
</html>
