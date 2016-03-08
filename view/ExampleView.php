<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 01.03.2016
 * Time: 15:46
 */

$serverName = "tbz.database.windows.net";
$connectionInfo = array("Database"=>"Shareloc", "UID"=>"Overlord","PWD"=>"123$321sehrSICHER");
$conn = sqlsrv_connect($serverName, $connectionInfo);

var_dump($conn);