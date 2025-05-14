<?php
    include '../DataAction/memo_sql_using.php';
    //    require_once '../SQL/test2.php';
    try{
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "CREATE TABLE  IF NOT EXISTS  memo (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(60) NOT NULL,
            sentence VARCHAR(255) NOT NULL
            )";

        $pdo->query($sql);
//データを格納
        memos_table_insert_data();

//データの削除
        memos_table_delete();


        } catch (PDOException $e){
            exit ($e->getMessage());
            #echo '接続できません';
        }

    $sql = 'SELECT * FROM memo';
    
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    $memos = [];
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $memos[] = $row;
    }
    $statement = null;
    $pdo = null;