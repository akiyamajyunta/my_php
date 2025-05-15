<?php
    //個人情報のテーブル表示。デバック用ページ
    include '../DataAction/info_sql_using.php';
    try{

        //新規ユーザーのデータを格納
            info_table_insert_data();

        } catch (PDOException $e){
            exit ($e->getMessage());
            #echo '接続できません';
        }
#下下下下下下下下下下下下下下下下デバック用下下下下下下下下下下下下下下下下下下下下下下下
 $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
    $sql = 'SELECT * FROM info';
    
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    $infos = [];
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $infos[] = $row;
    }
    $statement = null;
    $pdo = null;
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
                        <div>
                            <a><?= $info['password'] ?></a>
                        </div>
                        <hr>
                    </div>
                <?php 
                } ?>
        </table> 
<!-- 上上上上上上上上上上上上デバック用上上上上上上上上上上上上上上上上-->
<!-- phononiwasi@gmail.com
1111 -->