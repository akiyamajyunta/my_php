<?php
session_start();
if (($_POST)) {
    $password = $_POST['password'];
    $email = $_POST['mail'];

    $password = htmlspecialchars($password,ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($email,ENT_QUOTES,'UTF-8');
#(isset($_POST['delete']))
    if (($_POST['password'] === '') and ($_POST['mail'] === '') ){
        $password = "名前";
        $mail = "メール";
        header("Location: index.php?name=" . urlencode($password) . "&mail=" . urlencode($mail));
        exit();
    } else if ($_POST['password'] === '') {
        $password = "名前";
        header("Location: index.php?name=" .urlencode($password). "&mail=" );
        exit();
    } else if ($_POST['mail'] === '') {
        $mail = "メール";
        header("Location: index.php?name=" . "&mail=" . urlencode($mail));
    }else {
        echo 'ログインに成功しました';
    }
}
    //$password = "山田";
    $name = '山田';
    $email = 'yamada@gmail.com';
?>
<?php
// require_once 'using_table.php';
require_once 'using_table.php';
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
            <?php foreach ($memos as  $memo) { ?>
                    <!-- <td><?= $memo['id'] ?></td> -->
                    <div>
                        <div>
                            <a><?= $memo['title'] ?></a>
                        </div>
                        <div>
                            <a><?= $memo['sentence'] ?></a>
                        </div>
                        <form action='using_table.php' method="post">
                            <div>
                                <button name="delete" value=<?= $memo['id'] ?> type="submit">削除</button>
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
