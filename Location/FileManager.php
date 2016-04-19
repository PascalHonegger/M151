<?php

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 22.03.2016
 * Time: 15:35
 */

require_once "../model/ImageModel.php";

/**
 * Controller zum speichern der Bilder auf dem Server.
 * Die Bilder werden direkt auf dem Webserver und nicht in der Datenbank hinterlegt.
 */
class FileManager
{
    /**
     * @param $image
     * @param int $idcreator
     */

    private $model;

    /**
     * FileManager constructor.
     */
    public function __construct()
    {
        $this->model = new ImageModel();
    }

    /**
     * @param array $images
     * @param int $idLocation
     */
    public function setImage(array $images, int $idLocation)
    {
        $validImages = array();

        for ($i = 0; $i < count($images['error']); $i++) {
            if ($images['error'][$i] == 0) {
                array_push($validImages, $image);
            }
        }

        for ($i = 0; $i < count($validImages); $i++) {
            $targetFile = "../images/" . $this->model->createImage($idLocation) . '.' . pathinfo($images['name'][$i], PATHINFO_EXTENSION);
            move_uploaded_file($images['tmp_name'][$i], $targetFile);
        }
    }

    /**
     * @param $idLocation
     * @return bool|resource
     */
    public function getImages(int $idLocation)
    {
        return $this->model->getImages($idLocation);
    }
}