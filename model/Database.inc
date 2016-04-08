<?php
/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 08.03.2016
 * Time: 14:00
 */
/*
 * Singleton für die Datenbankanbindung
 */
class Database{

    private static $instance;
    private $serverName = "tbz.database.windows.net";
    private $connectionInfo = array("Database"=>"Shareloc", "UID"=>"Overlord","PWD"=>"123$321sehrSICHER");
    private $conn;

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionInfo);
    }

    public static function getConnection()
    {
        return self::getInstance()->conn;
    }

    public static function getInstance()
    {
        if (!self::$instance) { // If no instance then create one
            self::$instance = new self();
        }
        return self::$instance;
    }
}