<?
    //ここはログインした時の処理。未入力だったりすると、元のindex.phpへ戻す;
    require '../DataAction/info_sql_using.php';
    require '../DataAction/loginData_sql_using.php';

    session_start();
    // メールアドレスのチェック
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);

    if (empty($mail)) {
        $message = 'メールアドレスが入力されてません';
        header("Location: ../Front/index.php?message=$message");
    }

    // パスワードのチェック
    $password = filter_input(INPUT_POST, 'password');
    $password_next = filter_input(INPUT_POST, 'password_next');

    if (empty($password) and empty($password_next)){
        $message = 'パスワードを入力してください';
        header("Location: ../Front/index.php?message=$message");
    }elseif ($password !== $password_next) {
        $message = 'パスワードが一致しません';
        header("Location: ../Front/index.php?message=$message");
        }
    // エラーがある場合はindex.phpへリダイレクト

        // エラーがないなら場合は`審査後、.phpへリダイレクト
        //ここに、ログインの審査を行う関数を書く
        //login_Check($email,$password)
        login_Check($mail,$password);

//login_Checkで成功
        //header("Location: ../Front/main.php");
//login_Checkで失敗
        //header("Location: ../Front/index.php?username=$message");
