<?php

require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 14.03.2016
 * Time: 20:12
 */
class RegisterModel
{
    public function insert(string $username, string $password, string $surname, string $name, string $mail)
    {
        $connection = DataBase::getConnection();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO person(username, password, surname, name, mail) VALUES(?, ?, ?, ?, ?); SELECT SCOPE_IDENTITY() as ID;";

        //Execute Query
        $stmt = sqlsrv_query($connection, $query, array($username, $hashedPassword, $surname, $name, $mail));

        //Select next Result (SCOPE_IDENTITY)
        sqlsrv_next_result($stmt);
        $res = sqlsrv_fetch_array($stmt);

        //Load inserted Row
        $query = 'SELECT * FROM person WHERE id_person = '.$res['ID'];

        $stmt = sqlsrv_query($connection, $query);

        return sqlsrv_fetch_array($stmt);
    }
}