<?php
    //個人情報のテーブルの作製
    include 'info_sql_using.php';
    try{
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "CREATE TABLE  IF NOT EXISTS  info (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(60) NOT NULL,
            table_name VARCHAR(60) NOT NULL,
            mail VARCHAR(255) NOT NULL
            )";

        $pdo->query($sql);
//データを格納
        // include 'info_sql_using.php';より、
        info_table_insert_data();

//データの削除
        //users_table_delete();


        } catch (PDOException $e){
            exit ($e->getMessage());
            #echo '接続できません';
        }

    $sql = 'SELECT * FROM info';
    
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    $infos = [];
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $infos[] = $row;
    }
?>
            <table>
            <?php foreach ($infos as  $info) { ?>
                    <!-- <td><?= $info['id'] ?></td> -->
                    <div>
                        <div>
                            <a><?= $info['name'] ?></a>
                        </div>
                        <div>
                            <a><?= $info['table_name'] ?></a>
                        </div>
                        <div>
                            <a><?= $info['mail'] ?></a>
                        </div>

                        <hr>
                    </div>
                <?php 
                } ?>
        </table> 
    
<?php
    $statement = null;
    $pdo = null;
?>