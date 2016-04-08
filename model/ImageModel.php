<?php

require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Serafin
 * Date: 29.03.2016
 * Time: 13:25
 */
class ImageModel
{
    /**
     * @param int $idLocation
     * @return mixed
     */
    public function createImage(int $idLocation){

        $query = 'INSERT INTO image (fk_location) VALUES(?);SELECT SCOPE_IDENTITY() as ID';
        $stmt =  sqlsrv_query(Database::getConnection(), $query, array($idLocation));

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        sqlsrv_next_result($stmt);
        $stmt = sqlsrv_fetch_array($stmt);

        return $stmt['ID'];
    }

    /**
     * @param $idLocation
     * @return bool|resource
     */
    public function getImages(int $idLocation)
    {

        $query = 'SELECT id_image from image where fk_location = ?';

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        $stmt = sqlsrv_query(Database::getConnection(), $query, array($idLocation));

        return $stmt;
    }

}