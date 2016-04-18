<?php

require_once "../controller/CustomSession.php";
require_once "../model/EventModel.php";

/**
 * Created by PhpStorm.
 * User: mceagle
 * Date: 18.04.2016
 * Time: 18:03
 */
class EventsController
{

    public function ShowEvents(string $location)
    {
        echo "<p>".$location."</p>";

        $model = new EventModel();
        $events = $model->loadEventsByLocation($location);

        echo '
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>Beschreibung</td>
                        </tr>
                 ';

        while ($event = sqlsrv_fetch_array($events)) {
            $name = $event['name'];
            $description = $event['description'];
            echo '
                        <tr>
                            <td>'.$name.'</td>
                            <td>'.$description.'</td>
                        </tr>
                 ';
        }
        echo '</table>';
    }
}
