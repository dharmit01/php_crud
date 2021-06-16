<?php
    $connection = new PDO("mysql:host=localhost;dbname=database","root","root");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Successful";
?>