<?php
    session_start();
    //$data = $_GET['data'] ?? null;
    #始めにユーザーを格納するテーブルを作製しなければならない(義務) 

    require_once '../DataAction/info_sql_using.php';
    require_once '../DataAction/loginData_sql_using.php';
    make_table_Info_store();
    make_table_info();
    $name = 'ゲスト';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a>こんにちは <?php echo "<a>{$name}</a>";?>さん</a>
    <div>
        <a>ログイン</a>
        <div>
            <?php if (!empty($message)): ?>
                <a><?php echo $message; ?></a>
            <?php endif; ?>
        </div>
    </div>
    <form action='../PageAction/user_login.php' method="post">
        <div>
            <label>メールアドレス</label>
            <input name="mail" id="mail" type="text">
        </div>
        <div>
            <label>パスワード</label>
            <input name="password" id="password" type="password">
        </div>
        <div>
            <label>パスワード再入力</label>
            <input name="password_next" id="password_next" type="password">
        </div>
        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
    <!-- 新規登録 -->
    <form action="new_registration.php" method="post">
        <div>
            <button type="submit">新規登録</button>
        </div>
    </form>
</body>
</html>



<!-- 山田
YLRFBP9SIWXCHOV75M361UGKD40E8s
phononiwasi@gmail.com
123 -->