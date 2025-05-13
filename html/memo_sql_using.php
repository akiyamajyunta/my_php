<?php

    function memos_table_delete(){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
            if ($_POST) {
                if (isset($_POST['delete'])){
                    $id =  $_POST['delete'];

                    $sql = "DELETE FROM memo WHERE id = :id";

                    $statement = $pdo->prepare($sql);

                    $statement->bindValue(':id', $id, PDO::PARAM_INT);

                    $statement->execute();

                    header("Location: main.php");
                    exit();
                }
            }
        }

        function memos_table_insert_data(){
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                if ($_GET) {
                if (($_GET['title'] === '') and ($_GET['sentence'] === '') ){
                    header("Location: main.php");
                    exit();
                    } else if ($_GET['title'] === '') {
                        header("Location: main.php");
                        exit();
                    } else if ($_GET['sentence'] === '') {
                        header("Location: main.php");
                    }else {
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
                        header("Location: main.php");
                        exit();
                }

            }
        }







?>