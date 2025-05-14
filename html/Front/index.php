<?php
session_start();

    if (!empty($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            $message = $error;
        }
        unset($_SESSION['errors']);
    }

    //.$message = ''; 
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
                <a><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></a>
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