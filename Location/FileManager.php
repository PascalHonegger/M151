<?php

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 22.03.2016
 * Time: 15:35
 */
class FileManager
{
    /**
     * @param $image
     * @param int $idcreator
     */
    public function setImage($image, int $idcreator){

        $final = "";
        $target_file = "../images/" . $idcreator . ".jpg";
        foreach($image['tmp_name'] as $key => $image['tmp_name'])
        {

            $final = $final . $image['tmp_name'][$key];
        }
    var_dump($final);
        move_uploaded_file($image['tmp_name'][$final], $target_file);

    }

    public function getImage($idcreator){

        $src;


    }
}