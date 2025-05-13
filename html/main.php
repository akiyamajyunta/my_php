<?php
session_start();
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['mail'];

    $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($email,ENT_QUOTES,'UTF-8');

    if (($_POST['name'] === '') and ($_POST['mail'] === '') ){
        $name = "名前";
        $mail = "メール";
        header("Location: index.php?name=" . urlencode($name) . "&mail=" . urlencode($mail));
        exit();
    } else if ($_POST['name'] === '') {
        $name = "名前";
        header("Location: index.php?name=" .urlencode($name). "&mail=" );
        exit();
    } else if ($_POST['mail'] === '') {
        $mail = "メール";
        header("Location: index.php?name=" . "&mail=" . urlencode($mail));
    }else {
        echo 'ログインに成功しました';
    }
}
    $name = "山田";
    $email = 'yamada@gmail.com';
?>
<?php
require_once 'using_table.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <a><?= $name ?></a>
    </div>
    <div>
        <form action="using_table.php" method="get">
            <div>
                <div>
                    <input name="title" id="title" type="text">
                    <label>タイトル</label>
                </div>
                <div>
                    <input name="sentence" id="sentence" type="text">
                    <label>本文</label>
                </div>
                <div>
                    <button type="submit">ささやく</button>
                </div>
            </div>
        </form>
    </div>
    <div>
        <table>
            <?php foreach ($travels as  $travel) { ?>
                    <!-- <td><?= $travel['id'] ?></td> -->
                    <div>
                        <div>
                            <a><?= $travel['title'] ?></a>
                        </div>
                        <div>
                            <a><?= $travel['sentence'] ?></a>
                        </div>
                        <form action='using_table.php' method="post">
                            <div>
                                <button name="delete" value=<?= $travel['id'] ?> type="submit">削除</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                <?php 
                } ?>
        </table> 
    </div>


    <form action="index.php" method="post">
        <div>
            <button type="submit">ログアウト</button>
        </div>
    </form>
    </div>    
</body>
</html>
