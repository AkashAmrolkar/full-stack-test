<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wp_ass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo "Connection Error";
    die("Connection failed: " . $conn->connect_error);
    }
?>