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

        return $stmt['ID'];

    }

    public function getLocations() {
        $query = 'SELECT name, id_location AS id FROM location';

        $stmt = sqlsrv_query($this->connection, $query);

        return $stmt;
    }

    public function loadLocationsByIdAndName(int $startId, int $endId, string $location)
    {
        $query = "SELECT location.name AS name, 
                    location.description AS description, 
                    image.id_image AS imageName
                    FROM location
                    LEFT OUTER JOIN image ON image.fk_location = location.id_location 
                    WHERE location.name = '$location'
                    ORDER BY id_location
                    OFFSET $startId ROWS 
                    FETCH NEXT $endId ROWS ONLY ";

        /*
         *WHERE location.name LIKE ?
         * SELECT location.name AS name,
                    location.description AS description,
                    image.id_image AS imageName,
                    ROW_NUMBER() OVER (ORDER BY location.id_location) AS RowNumber
                    FROM location
                    INNER JOIN image ON image.fk_location = location.id_location
                    where RowNumber BETWEEN ? AND ?
                    AND location.name LIKE ?';

         */

        //, array($likeLocation/*,$startId,$endId - $startId*/)

        $stmt = sqlsrv_query(Database::getConnection(), $query);

        var_dump(sqlsrv_errors(SQLSRV_ERR_ALL));

        return $stmt;

    }
}
