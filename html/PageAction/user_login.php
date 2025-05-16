<?
    //ここはログインした時の処理。未入力だったりすると、元のindex.phpへ戻す;
    require '../DataAction/info_sql_using.php';
    require '../DataAction/loginData_sql_using.php';

    session_start();
    // メールアドレスのチェック
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);

    if (empty($mail)) {
        $message = 'メールアドレスが入力されてません';
        //header("Location: ../Front/index.php?message=$message");
    }

    // パスワードのチェック
    $password = filter_input(INPUT_POST, 'password');
    $password_next = filter_input(INPUT_POST, 'password_next');

    if (empty($password) and empty($password_next)){
        $message = 'パスワードを入力してください';
        //header("Location: ../Front/index.php?message=$message");
    }elseif ($password !== $password_next) {
        $message = 'パスワードが一致しません';
        //header("Location: ../Front/index.php?message=$message");
        }
    // エラーがある場合はindex.phpへリダイレクト

        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "SELECT * FROM info WHERE mail = :mail AND password = :password";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
//table_name
        if($result){
            //ログインに成功
            //echo $result['table_name'];これでテーブル名が見れる(確認済)
            $table_name = $result['table_name'];
            echo $table_name;
            Insert_Info_store($table_name);
           // header("Location: ../Front/main.php");
            //exit;
        }else{
            //ログイン失敗
            $table_name = $result['table_name'];
            echo $table_name;
            $message = 'ログイン失敗';
            //header("Location: ../Front/index.php?message=$message");
        }
    



