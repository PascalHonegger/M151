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
        $query = "INSERT INTO person(username, password, surname, name, mail) VALUES(?, ?, ?, ?, ?)";
        $stmt = sqlsrv_prepare($connection, $query, array($username, $hashedPassword, $surname, $name, $mail));
        sqlsrv_execute($stmt);

        $query = "SELECT SCOPE_IDENTITY() as ID";

        $id = sqlsrv_query($connection, $query);

        $query = 'SELECT * FROM person WHERE id_person = '.$id['ID'];

        $stmt = sqlsrv_query($connection, $query);

        return sqlsrv_fetch_array($stmt);
    }
}