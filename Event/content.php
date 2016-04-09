<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 13:31
 */

require_once "../model/LocationModel.php";
?>

<div id="content" class="NewEventContent">
    <h1 id="RegisterTitle">Entdecken</h1>

    <form method="post" action="NewEventController.php">


        <label for="eventname" class="SettingsLabel"> Event Name </label> <br />
             <input type="text" name="eventname" class="ContentInput" id="eventname"> <br />

        <label for="NewEventTextarea" class="SettingsLabel">Beschreibung</label> <br />
            <textarea name="eventdescription" id="NewEventTextarea" class="NevEventTextarea"></textarea> <br />

        <label for="NewEventLocationSelection" class="SettingsLabel"> Ort: </label> <br />
            <select name="location" id="NewEventLocationSelection" class="NewEventDropdown">
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

        <a href="Event.php?action=NewPlace" id="NewLocLink">Neuer Ort</a> <br />

        <input type="submit" id="Submit" class="RegisterButton" value="Erstellen">
        <input type="reset" id="Reset" class="RegisterButton" value="Abbrechen">
    </form>


</div>