<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 22.03.2016
 * Time: 15:09
 */

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
    <?php include "../Home/Header.php";

    require_once "content.php";

    require_once "../Home/contentmenu.php";

    require_once "../Home/Footer.php"; ?>
</div>
</body>
</html>