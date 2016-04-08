<?php

require_once "../Location/FileManager.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 08.04.2016
 * Time: 19:26
 */
class DiscoverRowBuilder
{
    /**
     * DiscoverRowBuilder constructor.
     * @param array $location
     */
    function __construct(array $location)
    {
        echo '<p> Name = ' . $location['name'] . ' Dascription = ' . $location['description'] . ' Bild = </p>';

        $filemanager = new FileManager();

        if (is_int($location['id_location'])) {
            $images = $filemanager->getImages($location['id_location']);

            while ($image = sqlsrv_fetch_array($images)['id_image']) {
                echo '<img src="../images/' . $image . '.jpg" class="slides" \>';
            }
        }
    }
}