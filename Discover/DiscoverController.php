<?php

require_once "../model/LocationModel.php";
require_once "../controller/CustomSession.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 01.03.2016
 * Time: 15:44
 */
class DiscoverController
{
    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new LocationModel();
        $this->session = CustomSession::getInstance();
    }

    public function loadLocations(int $from, int $to, string $nameFilter)
    {
        $datas = $this->model->loadLocationsByIdAndName($from,$to,$nameFilter);

        while($locations = sqlsrv_fetch_array($datas))
        {
            echo '<p> Name = '.$locations['name'].' Dascription = '.$locations['description'].' Bild = </p>';
        }
        echo '<p>LÄCK BOBBY</p>';
    }
}
