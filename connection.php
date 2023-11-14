<?php
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'users_db';
    $db_connect = new mysqli($localhost, $username, $password, $database);

    if($db_connect -> connect_error){
        echo 'Error connecting to database' .$db_connect -> connection_error;   
    }
    else{
        echo 'Connected to database';
    }
?>