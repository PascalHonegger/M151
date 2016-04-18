<?php

require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 15.03.2016
 * Time: 14:02
 */

/**
 * Model für die Events.
 */
class EventModel
{

    private $connection;

    /**
     * EventModel constructor.
     */
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * Erstellt einen Event und gib die ID dessen zurück
     * @param int $idcreator
     * @param string $name
     * @param string $description
     * @param int $location
     * @return mixed
     */
    public function createEvent(int $idcreator, string $name, string $description, int $location)
    {
        $query = 'INSERT INTO event(fk_person_creator,fk_location,name,description) VALUES (?,?,?,?);SELECT SCOPE_IDENTITY() as ID';
        $stmt = sqlsrv_query(Database::getConnection(), $query, array($idcreator,$location,$name,$description));

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        //Select next Result (SCOPE_IDENTITY)
        sqlsrv_next_result($stmt);
        $stmt = sqlsrv_fetch_array($stmt);

        return $stmt['ID'];

    }

    public function loadEventsByLocation(string $location)
    {
        $query = 'SELECT event.name as name, event.description as description FROM event INNER JOIN location ON event.fk_location = location.id_location WHERE location.name = \''. $location.'\'';

        $stmt = sqlsrv_query($this->connection, $query);

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        return $stmt;
    }
}
