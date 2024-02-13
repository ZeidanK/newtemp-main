<?php 

// main connection file for php to connect the sql server will include it in other php files 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "main1"; 
    $db_name1 = "main1"; 
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    $conn1 = new mysqli($servername, $username, $password, $db_name1, 3306);
    if($conn1->connect_error){
        die("Connection failed".$conn1->connect_error);
    }
    echo "";
    
    ?>