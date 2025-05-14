<?
//ランダムな文字列の生成
            const RANDOM_CHARS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                    function random_string($length) {
                    $shuffled_chars = str_shuffle(RANDOM_CHARS);
                    $random_string = substr($shuffled_chars, 0, $length);
                    return $random_string . 's';
            }
//個人情報な文字列の生成     
        function info_table_insert_data(){
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                if ($_GET) {
                if (($_GET['name'] === '') and ($_GET['mail'] === '')and ($_GET['password'] === '')){
                    header("Location: index.php");
                    exit();
                } else if ($_GET['name'] === '') {
                    header("Location: index.php");
                    exit();
                } else if ($_GET['mail'] === '') {
                    header("Location: index.php");
                }else if ($_GET['password'] === '') {
                    header("Location: index.php");
                }else {
                    $name    = $_GET['name'];
                    $table_name  =  random_string(29);
                    $mail = $_GET['mail'];
                    $password = $_GET['password'];
                    
                    $sql = "INSERT INTO info
                                (name, table_name, mail, password) 
                            VALUES 
                                (:name , :table_name, :mail, :password)";

                    $statement = $pdo->prepare($sql);

                    $statement->bindValue(':name', $name, PDO::PARAM_STR);
                    $statement->bindValue(':table_name', $table_name, PDO::PARAM_STR);
                    $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
                    $statement->bindValue(':password', $password, PDO::PARAM_STR);

                    $statement->execute();
                    header("Location: index.php");
                    exit();
                }

            }
        }
            // name VARCHAR(60) NOT NULL,
            // table_name VARCHAR(60) NOT NULL,
            // mail VARCHAR(255) NOT NULL