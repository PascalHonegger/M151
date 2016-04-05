<?php

require_once "../model/LocationModel.php";
require_once "../controller/CustomSession.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 01.03.2016
 * Time: 15:44
 */
class Login
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
        //TODO Alain
    }
}
