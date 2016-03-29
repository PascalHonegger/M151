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

    public function createImage(int $id_location){

        $query = 'INSERT INTO image (fk_location) VALUES(?);SELECT SCOPE_IDENTITY() as ID';
        $stmt =  sqlsrv_query(Database::getConnection(), $query, array($id_location));

        sqlsrv_next_result($stmt);
        $stmt = sqlsrv_fetch_array($stmt);

        return $stmt['ID'];



    }

    public function  getImages($id_location){

        $query = 'SELECT id_image from image where fk_location = ?';
        $stmt = sqlsrv_query(Database::getConnection(), $query, array($id_location));

        return $stmt;
    }

}