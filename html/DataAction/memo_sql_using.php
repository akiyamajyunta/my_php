<?php
//メモテーブルの作製
    function memo_create_table(){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "CREATE TABLE  IF NOT EXISTS  memo (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(60) NOT NULL,
            sentence VARCHAR(255) NOT NULL
            )";

        $pdo->query($sql);
    }
//データの削除
    function memos_table_delete(){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
            if ($_POST) {
                if (isset($_POST['delete'])){
                    $id =  $_POST['delete'];
                    $sql = "DELETE FROM memo WHERE id = :id";

                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(':id', $id, PDO::PARAM_INT);
                    $statement->execute();
                    header("Location: ../Front/main.php");
                    exit();
                }
            }
    }

//データの挿入
        function memos_table_insert_data(){
            if ($_GET) {
                if (($_GET['title'] === '') or ($_GET['sentence'] === '') ){
                    header("Location: ../Front/main.php");
                    exit();
                    }else {
                        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                        $title    = $_GET['title'];
                        $sentence = $_GET['sentence'];

                        $sql = "INSERT INTO  memo 
                                    (title, sentence) 
                                VALUES 
                                    (:title , :sentence )";
                        $statement = $pdo->prepare($sql);
                        $statement->bindValue(':title', $title, PDO::PARAM_STR);
                        $statement->bindValue(':sentence', $sentence, PDO::PARAM_STR);
                        $statement->execute();
                        header("Location: ../Front/main.php");
                        exit();
                }
            }
        }







?>