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

    public function setImage($image, int $id_location){

        $final = "";
        $target_file = "../images/" . $this->model->createImage($id_location) . ".jpg";
        /*foreach($image['tmp_name'] as $key => $image['tmp_name'])
        {

            $final = $final . $image['tmp_name'][$key];
        }
    var_dump($final);*/
        move_uploaded_file($image['tmp_name'][0], $target_file);

    }

    public function getImage($id_location){

        return $this->model->getImages($id_location);
    }
}