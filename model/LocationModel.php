<?php

require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 15.03.2016
 * Time: 14:02
 */
class LocationModel
{

    private $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function creatLocation(int $idcreator, string $name, string $description, string $position)
    {
        $query = 'INSERT INTO location(fk_person_creator,position,name,description) VALUES (?,?,?,?);SELECT SCOPE_IDENTITY() as ID';
        $stmt = sqlsrv_query(Database::getConnection(), $query, array($idcreator,$position,$name,$description));

        //Select next Result (SCOPE_IDENTITY)
        sqlsrv_next_result($stmt);
        $stmt = sqlsrv_fetch_array($stmt);

        if($stmt){
            $query = 'INSERT INTO image (fk_location) VALUES(?)';
            sqlsrv_query($this->connection, $query, array($stmt['ID']));
        }

        return $stmt['ID'];

    }

    public function getImages(int $fk_location){

        $query ='SELECT fk_location';

    }

    public function getLocations() {
        $query = 'SELECT name, id_location AS id FROM location';

        $stmt = sqlsrv_query($this->connection, $query);

        return $stmt;
    }
}
