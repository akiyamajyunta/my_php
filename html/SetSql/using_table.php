<?php
    include '../DataAction/memo_sql_using.php';
    //    require_once '../SQL/test2.php';
    try{
        memo_create_table();
//データを格納
        memos_table_insert_data();

//データの削除
        memos_table_delete();


        } catch (PDOException $e){
            exit ($e->getMessage());
            #echo '接続できません';
        }
    $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
    
    $sql = 'SELECT * FROM memo';
    
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    $memos = [];
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $memos[] = $row;
    }
    $statement = null;
    $pdo = null;