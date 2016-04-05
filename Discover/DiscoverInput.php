<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 29.03.2016
 * Time: 15:11
 */

require_once "DiscoverController.php";

$from = filter_input(INPUT_POST, 'Min', FILTER_SANITIZE_NUMBER_INT) ?? 0;
$to = filter_input(INPUT_POST, 'Max', FILTER_SANITIZE_NUMBER_INT) ?? 0;
$filterName = filter_input(INPUT_POST, 'StringFilter', FILTER_SANITIZE_STRING) ?? "";

$controller = new DiscoverController();

$controller->loadLocations($from, $to, $filterName);