<?
    //////////////////////////////デバック///////////////////////////////////////
        ///登録したテーブル名
        
                $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql = 'SELECT * FROM InfoStore';
                
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $statement = null;
                $pdo = null;
                $InfoStore = [];
                $InfoStore[] = $row;
                //echo var_dump( $InfoStore[0]['table_name']);
            if ($InfoStore[0]['table_name']){
                        echo  $InfoStore[0]['table_name'] .'テーブルの名前';//$InfoStore[0];
                    }
        
echo '--------------------------------ここからはユーザー情報-----------------------------------------------';
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
    <?php foreach ($infos as $info) { ?>
    <tr>
        <td><?= htmlspecialchars($info['id'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['name'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['table_name'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['mail'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['password'], ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <?php } ?>
</table>


<!-- id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(60) NOT NULL,
                table_name VARCHAR(60) NOT NULL,
                mail VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL -->