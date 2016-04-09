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
        echo '<div id="contentLocation"><label class="LocationRow"> Name: </label> </br> <p class="LocationValue"> ' . $location['name'] . '</p></br> <label class="LocationRow"> Description: </label> </br> <p class="LocationValue"> ' . $location['description'] . '</p> ';

        $filemanager = new FileManager();

        $stmt = $filemanager->getImages($location['id_location']);

        $images = array();

        while ($id = sqlsrv_fetch_array($stmt)['id_image']) {
            array_push($images, $id);
        }

        if (count($images) > 0) {
            echo '<div class="slides">';
            foreach ($images as $image) {
                echo '<img src="../images/' . $image . '.jpg" \>';
            }
            echo '</div>';
        }

        echo '</p> </div>';
    }
}