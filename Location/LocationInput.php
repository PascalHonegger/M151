<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 29.03.2016
 * Time: 15:15
 */

$creator = filter_input(INPUT_POST, 'creator', FILTER_SANITIZE_NUMBER_INT) ?? "";
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) ?? "";
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) ?? "";
$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING) ?? "";

$Location = new Location();
$Location->createLocation($creator, $name, $description, $position);