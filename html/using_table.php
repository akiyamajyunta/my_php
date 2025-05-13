<?php
    include 'sql_using.php';
    // $pdo = new PDO('mysql:host=localhost; dbname=mydatas; charset=utf8','root','root');
    try{
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "CREATE TABLE  IF NOT EXISTS  users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(60) NOT NULL,
            sentence VARCHAR(255) NOT NULL
            )";

        $pdo->query($sql);
//データを格納
        users_table_insert_data();

//データの削除
        users_table_delete();


        } catch (PDOException $e){
            exit ($e->getMessage());
            #echo '接続できません';
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

    //require_once 'show_table.php';