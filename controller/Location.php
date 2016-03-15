<?php

require_once "../model/LocationModel.php";

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 15.03.2016
 * Time: 15:09
 */
class Location
{
    private $model;

      public function __construct()
      {
          $this->model = new LocationModel();
      }

    public function createLocation(int $idcreator, string $name, string $description, string $position){

        $error = 0;

        if(!$idcreator || !$position) {
            $error = 1;
        }

        if(strlen($name) >= 40 || strlen($name) <= 1 || strlen($description) >= 100 || strlen($description) <= 1){

            $error = 4;

        }

        if($error == 0){

            $inserted = $this->model->creatLocation($idcreator,$name,$description,$position);

            if($inserted){
                return;
            }

            $error = 126;
        }

        header('Location: ../index.php?action=register&error=' . $error);
    }

}

$test = new Location();

$test->createLocation(7,"LOOOvv","Low, Lower, The Lowest","123321");