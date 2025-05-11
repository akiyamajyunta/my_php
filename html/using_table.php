<?php

    // $pdo = new PDO('mysql:host=localhost; dbname=mydatas; charset=utf8','root','root');
    try{
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = 'CREATE TABLE users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(60) NOT NULL,
            email VARCHAR(255) NOT NULL
            )';
        
        $sql = "INSERT INTO users 
                    (name, email) 
                VALUES 
                    ('田中', 'tanaka@gmail.com'),
                    ('山田', 'yamada@gmail.com'),
                    ('石田', 'ishida@gmail.com')";

        $pdo->query($sql);
        
        } catch (PDOException $e){
            exit ($e->getMessage());
        }

    $sql = 'SELECT * FROM users';
    
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    $travels = [];
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $travels[] = $row;
    }

    $statement = null;
    $pdo = null;

    require_once 'show_table.php';


