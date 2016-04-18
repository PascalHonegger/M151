<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 13:31
 */

require_once "EventsController.php";
?>

<div id="content" class="NewEventContent">
    <h1 id="RegisterTitle">Entdecken</h1>

    <?php
        $location = $_GET['loc'];

    $controller = new EventsController();
    $controller->ShowEvents($location);
    ?>


</div>