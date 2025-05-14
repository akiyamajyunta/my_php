<?
    //echo 'hello';
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
    // エラーがある場合はリダイレクト
    if (!empty($err)) {
        $_SESSION['errors'] = $err;
        header("Location: ../Front/index.php");
        exit;
    }else{
        header("Location: ../Front/main.php");
        exit;
    }

    //'../PageAction/user_login.php'