<?php

require_once "Database.inc";
require_once "LoginModel.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 14.03.2016
 * Time: 20:12
 */

/**
 * Model für die Registrierung
 */
class RegisterModel
{
    /**
     * Fügt einen neuen User der Person hinzu.
     * @param string $username
     * @param string $password
     * @param string $surname
     * @param string $name
     * @param string $mail
     * @return array|false|null
     */
    public function insert(string $username, string $password, string $surname, string $name, string $mail)
    {
        $loginModel = new LoginModel();

        $user = $loginModel->load($username);

        //User already exists
        if($user != null)
        {
            return false;
        }

        $connection = Database::getConnection();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO person(username, password, surname, name, mail) VALUES(?, ?, ?, ?, ?); SELECT SCOPE_IDENTITY() as ID;";

        //Execute Query
        $stmt = sqlsrv_query($connection, $query, array($username, $hashedPassword, $surname, $name, $mail));

        if (sqlsrv_errors()) {
            http_response_code(500);
        }

        //Select next Result (SCOPE_IDENTITY)
        sqlsrv_next_result($stmt);

        $res = sqlsrv_fetch_array($stmt);

        //Load inserted Row
        $query = 'SELECT * FROM person WHERE id_person = '.$res['ID'];

        $stmt = sqlsrv_query($connection, $query);

        return sqlsrv_fetch_array($stmt);
    }
}