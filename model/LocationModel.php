<?php

require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 15.03.2016
 * Time: 14:02
 */

/**
 * Model für die Orte
 */
class LocationModel
{

    private $connection;

    /**
     * LocationModel constructor.
     */
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * Erstellt einen Ort in der Datenbank.
     * @param int $idcreator
     * @param string $name
     * @param string $description
     * @param string $position
     * @return mixed
     */
    public function creatLocation(int $idcreator, string $name, string $description, string $position)
    {
        $query = 'INSERT INTO location(fk_person_creator,position,name,description) VALUES (?,?,?,?);SELECT SCOPE_IDENTITY() as ID';
        $stmt = sqlsrv_query(Database::getConnection(), $query, array($idcreator,$position,$name,$description));

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        //Select next Result (SCOPE_IDENTITY)
        sqlsrv_next_result($stmt);
        $stmt = sqlsrv_fetch_array($stmt);

        return $stmt['ID'];
    }

    /**
     * Alle Locations. Verwendet beim Erstellen der Events.
     * @return bool|resource
     */
    public function getLocations() {
        $query = 'SELECT name, id_location AS id FROM location';

        $stmt = sqlsrv_query($this->connection, $query);

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        return $stmt;
    }

    /**
     * Lädt die Orte, welche den mitgegebenen String im Namen enthalten.
     * Offset: Beim wievielten Datensatz das Laden beginnt
     * Rows: Wie viele Datensätze geladen werden
     * @param int $offset
     * @param int $rows
     * @param string $location
     * @return bool|resource
     */
    public function loadLocationsByIdAndName(int $offset, int $rows, string $location)
    {
        $query = "SELECT 
                    location.id_location AS id_location,
                    location.name AS name, 
                    location.description AS description, 
                    image.id_image AS imageName
                    FROM location
                    LEFT OUTER JOIN image ON image.fk_location = location.id_location 
                    WHERE location.name LIKE ?
                    ORDER BY id_location
                    OFFSET $offset ROWS 
                    FETCH NEXT $rows ROWS ONLY ";

        $stmt = sqlsrv_query(Database::getConnection(), $query, ['%' . $location . '%']);

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        return $stmt;
    }
}
