<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 13:31
 */

require_once "../model/LocationModel.php";
?>

<div id="content">
        <?php
            $session = CustomSession::getInstance();

            echo "Hallo ".$session->getCurrentUser()['username'];
        ?>
    <h1>Neuer Event</h1>

    <form method="post" action="NewEventController.php">


        <label> Event Name
            <input type="text" name="eventname" class="NewEventInput">
        </label>
        <label for="NewEventTextarea">Beschreibung</label><textarea name="eventdescription" id="NewEventTextarea">BESCHREIBUNG</textarea>

        <label> Ort:
            <select name="location">
                <?php
            $model = new LocationModel();
            $temp = $model->getLocations();
                while($locations = sqlsrv_fetch_array($temp))
                {
                $loc = $locations['name'];
                $locID = $locations['id'];
                echo "
                <option value='$locID' >$loc</option>
                ";
                }
                ?>
            </select>
        </label>
        <a href="Event.php?action=NewPlace">Neuer Ort</a>

        <input type="submit" id="NewEventSubmit" class="NewEventButton">
        <input type="reset" id="NewEventReset" class="NewEventButton">
    </form>


</div>