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
     * @param $image
     * @param int $idLocation
     */
    public function setImage($image, int $idLocation){
        $targetFile = "../images/" . $this->model->createImage($idLocation) . ".jpg";
        move_uploaded_file($image['tmp_name'][0], $targetFile);
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