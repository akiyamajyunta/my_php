<?
function make_table_info(){
    try{
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "CREATE TABLE  IF NOT EXISTS  info (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(60) NOT NULL,
            table_name VARCHAR(60) NOT NULL,
            mail VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
            )";

        $pdo->query($sql);


        } catch (PDOException $e){
            exit ($e->getMessage());
            #echo '接続できません';
        }
}

    // $statement = null;
    // $pdo = null;