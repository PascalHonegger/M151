<?php

require_once "../Location/FileManager.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 08.04.2016
 * Time: 19:26
 */

/**
 * Hilfsklasse für DiscoverController. Stellt einen Location-Wert für das Entdecken bereit
 */
class DiscoverRowBuilder
{
    /**
     * DiscoverRowBuilder constructor.
     * @param array $location
     */
    function __construct(array $location)
    {
        echo '
        <div id="' . $location['id_location'] . '" class="contentLocation">
            <table style="width:100%">
            <tr>
            <th>Name:</th>
            <th>Description:</th>
            </tr>
            <tr>
            <td>' . $location['name'] . '</td>
            <td>' . $location['description'] . '</td>
            </tr>
            </table>';

        $filemanager = new FileManager();

        $stmt = $filemanager->getImages($location['id_location']);

        $images = array();

        while ($id = sqlsrv_fetch_array($stmt)['id_image']) {
            array_push($images, $id);
        }

        if (count($images) > 0) {
            echo '<div class="slides">';
            foreach ($images as $image) {
                echo '<img src="../images/' . $image . '.jpg" width="100%"\>';
            }
            echo '</div>';
        }

        echo '</div>';
    }
}