<?php

    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.
    
    
    
    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $database = "pizzeria_database";
    $dbport = 3306;

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } 
    //echo "Connected successfully (".$db->host_info.")";


?>