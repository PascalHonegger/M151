<?php

require_once "../controller/CustomSession.php";
require_once "Database.inc";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 22.03.2016
 * Time: 13:35
 */

/**
 * Model für das Anpassen der Daten eines Users.
 */
class EditSettingsModel
{
    private $session;

    /**
     * EditSettingsModel constructor.
     */
    public function __construct()
    {
        $this->session = CustomSession::getInstance();
    }

    /**
     * Fügt einen neuen User der Person hinzu.
     * @param string $username
     * @param string $name
     * @param string $surname
     * @param string $mail
     * @param string $password
     * @param string $secret
     * @return array|false|null
     */
    public function update(string $username, string $name, string $surname, string $mail, $password, $secret)
    {
        $connection = Database::getConnection();
        $hashedPassword = $password != null ? password_hash($password, PASSWORD_BCRYPT) : $this->session->getCurrentUser()['password'];
        $personId = $this->session->getCurrentUser()['id_person'];

        $query = "UPDATE person SET username = ?, password = ?, surname = ?, name = ?, mail = ?, secret = ? WHERE id_person = ?";

        //Execute Query
        sqlsrv_query($connection, $query, array($username, $hashedPassword, $surname, $name, $mail, $secret, $personId));

        if (sqlsrv_errors()) {
            http_response_code(500);
        }
    }
}