<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'users123';
    //connection with database
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die('Connection was not created due to some technical error:'.mysqli_connect_error());
    }
?>