<?php

require_once "../model/LocationModel.php";
require_once "FileManager.php";

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 15.03.2016
 * Time: 15:09
 */

/**
 * Controller für die Orte
 */
class Location
{
    private $model;

    /**
     * Location constructor.
     */
    public function __construct()
      {
          $this->model = new LocationModel();
      }

    /**
     * @param int $idCreator
     * @param string $name
     * @param string $description
     * @param string $position
     */
    public function createLocation(int $idCreator, string $name, string $description, string $position){
        $error = 0;

        if (strlen($name) > 50 || strlen($name) < 1 || strlen($description) > 100 || strlen($description) < 1) {
            $error = 4;
        }

        if(!$_FILES['userfile']){
            $error = 5;
        }

        if($error == 0){
            $inserted = $this->model->creatLocation($idCreator,$name,$description,$position);

            if($inserted){
                $filemanager = new FileManager();
                $filemanager->setImage($_FILES['userfile'],$inserted);
                return;
            }
        }

        http_response_code(500);
    }

}
