<?php
require '../DataAction/info_sql_using.php';
require '../DataAction/loginData_sql_using.php';
require_once '../SetSql/using_table.php';
$table_name = Pic_InfoStore();
$name = put_user_info($table_name);


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
        <?php if (!empty($name)): ?>
            <a><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></a>
        <?php endif; ?>
    </div>
    <div>
        <form action="../SetSql/using_table.php" method="get">
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
                        <form action='../SetSql/using_table.php' method="post">
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
    <form action="../Front/index.php" method="post">
        <div>
            <button type="submit">ログアウト</button>
        </div>
    </form>
    </div>    
</body>
</html>
