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
    <form action="use_information.php" method="get">
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
            <button type="submit">新規登録</button>
        </div>
    </form>

    <form action="index.php" method="post">
        <div>
            <button type="submit">戻る</button>
        </div>
    </form>
</body>
</html>