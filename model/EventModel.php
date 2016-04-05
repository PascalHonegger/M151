<?php

require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 15.03.2016
 * Time: 14:02
 */
class EventModel
{

    private $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function createEvent(int $idcreator, string $name, string $description, int $location)
    {
        $query = 'INSERT INTO event(fk_person_creator,fk_location,name,description) VALUES (?,?,?,?);SELECT SCOPE_IDENTITY() as ID';
        $stmt = sqlsrv_query(Database::getConnection(), $query, array($idcreator,$location,$name,$description));

        //Select next Result (SCOPE_IDENTITY)
        sqlsrv_next_result($stmt);
        $stmt = sqlsrv_fetch_array($stmt);

        return $stmt['ID'];

    }
}
