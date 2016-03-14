<?php

require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 14.03.2016
 * Time: 19:04
 */
class LoginModel
{
    public static function load(string $username)
    {
        $query = 'SELECT * FROM person WHERE name = ?';
        $stmt = sqlsrv_prepare(Database::getConnection(), $query, array($username));
        sqlsrv_execute($stmt);
        return sqlsrv_fetch_array($stmt);
    }
}