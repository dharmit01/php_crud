<?php
    require "pdo.php";
    $id = $_GET['id'];
    $sql = 'DELETE from student WHERE id=:id';
    $stmt = $connection->prepare($sql);
        
    if($stmt->execute([':id' => $id])){
        header("Location: /CRUD/index.php");
    }
?>