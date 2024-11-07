<?php
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "store";

// Create connection
    $conn = new mysqli($servername, $username,(string) $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}