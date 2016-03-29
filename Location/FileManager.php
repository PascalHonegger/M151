<?php

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 22.03.2016
 * Time: 15:35
 */

require_once "../model/ImageModel.php";

class FileManager
{
    /**
     * @param $image
     * @param int $idcreator
     */

    private $model;

    public function __construct()
    {
        $this->model = new ImageModel();
    }

    public function setImage($image, int $idLocation){
        $targetFile = "../images/" . $this->model->createImage($idLocation) . ".jpg";
        move_uploaded_file($image['tmp_name'][0], $targetFile);

    }

    public function getImage($idLocation){

        return $this->model->getImages($idLocation);
    }
}