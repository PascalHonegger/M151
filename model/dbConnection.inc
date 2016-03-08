<?php
/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 08.03.2016
 * Time: 14:00
 */
class Database{

    private $serverName = "tbz.database.windows.net";
    private $connectionInfo = array("Database"=>"Shareloc", "UID"=>"Overlord","PWD"=>"123$321sehrSICHER");
    private $conn;
    private static $instance;

    public static function getInstance() {
        if(!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Database constructor.
     */
    private function __construct() {
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionInfo);

        // Error handling
        if(sqlsrv_errors()) {
            print_r(sqlsrv_errors());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}
?>