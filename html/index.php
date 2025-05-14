<?php
if ($_GET) {
    if (($_GET['name']) and ($_GET['mail'])){
            $message = '名前とメールが入力されていません';
            $name = 'ゲスト';
    }else{
        if ($_GET['name']){
            $message = '名前が入力されていません';
        }else{
            $name = 'ゲスト';
        }

        if ($_GET['mail']){
            $message = 'メールが入力されていません';
            
        }else{
            $name = 'ゲスト';
        }
    }
}else{
    $message = ''; 
    $name = 'ゲスト';
}




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
            <?php echo "<a>{$message}</a>";?>
        </div>    
    </div>
    <form action="main.php" method="post">
        <div>
            <label>メールアドレス</label>
            <input name="mail" id="mail" type="text">
        </div>
        <div>
            <label>パスワード</label>
            <input name="password" id="password" type="text">
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