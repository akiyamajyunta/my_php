<?php

    // $pdo = new PDO('mysql:host=localhost; dbname=mydatas; charset=utf8','root','root');
    $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

    $sql = 'SELECT * FROM mydatas';
    
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    $travels = [];
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $travels[] = $row;
    }

    $statement = null;
    $pdo = null;

    require_once 'show_table.php';


