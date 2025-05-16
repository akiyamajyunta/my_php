<?
if (isset($_GET['message'])) {
    $message = $_GET['message'];
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
    <div>
        <a>新規登録</a>
    </div>
    <div>
        <?php if (!empty($message)): ?>
            <a><?php echo $message; ?></a>
        <?php endif; ?>
    </div>
    <form action="../SetSql/use_information.php" method="get">
        <div>
            <label>ユーザー名:</label>
            <input name="name" id="name" type="text">
        </div>
        <div>
            <label>メールアドレス</label>
            <input name="mail" id="mail" type="text">
        </div>
        <div>
            <label>パスワード</label>
            <input name="password" id="password" type="text">
        </div>
        <div>
            <button type="submit">登録する</button>
        </div>
    </form>

    <form action="index.php" method="post">
        <div>
            <button type="submit">戻る</button>
        </div>
    </form>
</body>
</html>
<!-- 
山田
6JA4ES0O2IL51B9HYWXNZGMRVCPTUs
phononiwasi@gmail.com
1111 -->