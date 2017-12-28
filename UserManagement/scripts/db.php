<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/12/2017
 * Time: 09:27 PM
 */

$host = "localhost";
$user = "******";
$dbPassword = "******";
$database = "ajax";
$port = "3306";


$connection = new mysqli($host, $user, $dbPassword, $database, $port);

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($connection->connect_error) {
    die('Connect Error (' . $connection->connect_errno . ') '
        . $connection->connect_error);
}
