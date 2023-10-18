<?php
function get_conn()
{
    $serverName = "localhost";
    $userName = "root";
    $pass = "";
    $dbName = "cms";

    $conn = new mysqli($serverName, $userName, $pass, $dbName);
    return $conn;
}
