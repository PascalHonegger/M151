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
    public function load(string $username)
    {
        $query = 'SELECT * FROM person WHERE username = ?';
        $stmt = sqlsrv_query(Database::getConnection(), $query, array($username));
        return sqlsrv_fetch_array($stmt);
    }
}