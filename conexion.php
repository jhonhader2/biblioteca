<?php

$hostname   = "localhost";
$user       = "root";
$password   = null;
$database   = "biblioteca";

try {
    $con = mysqli_connect($hostname, $user, $password, $database);
    $con->set_charset("utf8");
} catch (\Throwable $e) {
    print $e->getMessage();
}
