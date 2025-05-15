<?
    //ここはログインした時の処理。未入力だったりすると、元のindex.phpへ戻す;
    require '../DataAction/info_sql_using.php';
    require '../DataAction/loginData_sql_using.php';
    session_start();
    $err = [];

    // メールアドレスのチェック
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);

    if (empty($mail)) {
        $err[] = 'メールアドレスが入力されていません';
    }

    // パスワードのチェック
    $password = filter_input(INPUT_POST, 'password');
    $password_next = filter_input(INPUT_POST, 'password_next');

    if (empty($password) and empty($password_next)){
        $err[] = 'パスワードを入力してください';
        }else{
                if ($password !== $password_next) {
                    $err[] = 'パスワードが一致しません';
            }
        }
    // エラーがある場合はindex.phpへリダイレクト
    if (!empty($err)) {
        $_SESSION['errors'] = $err;
        header("Location: ../Front/index.php");
        exit;
    }else{
        // エラーがないなら場合は`審査後、.phpへリダイレクト
        //ここに、ログインの審査を行う関数を書く
        //login_Check($email,$password)
        login_Check($mail,$password);

    }
