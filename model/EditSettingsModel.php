<?php

require_once "../controller/CustomSession.php";

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 22.03.2016
 * Time: 13:35
 */
class EditSettingsModel
{
    private $session;

    public function __construct()
    {
        $this->session = CustomSession::getInstance();
    }

    /**
     * Fügt einen neuen User der Person hinzu.
     * @param string $username
     * @param string $password
     * @param string $surname
     * @param string $name
     * @param string $mail
     * @return array|false|null
     */
    public function update(string $username, string $password, string $surname, string $name, string $mail)
    {
        $connection = Database::getConnection();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE person SET username = ?, password = ?, surname = ?, name = ?, mail = ?, secret = ? WHERE id_person = ?";

        //Execute Query
        $stmt = sqlsrv_query($connection, $query, array($username, $hashedPassword, $surname, $name, $mail, $this->session->getCurrentUser()['id_person']));

        //Select next Result (SCOPE_IDENTITY)
        sqlsrv_next_result($stmt);

        $res = sqlsrv_fetch_array($stmt);

        //Load inserted Row
        $query = 'SELECT * FROM person WHERE id_person = '.$res['ID'];

        sqlsrv_query($connection, $query);
    }
}