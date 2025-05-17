<?
    //ここはログインした時の処理。未入力だったりすると、元のindex.phpへ戻す;
    require '../DataAction/info_sql_using.php';
    require '../DataAction/loginData_sql_using.php';

    session_start();
    // メールアドレスのチェック
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        // パスワードのチェック
    $password = filter_input(INPUT_POST, 'password');
    $password_next = filter_input(INPUT_POST, 'password_next');



    if (empty($mail)) {
        $message = 'メールアドレスが入力されてません';
        header("Location: ../Front/index.php?message=$message");
        exit;
    }

    if (empty($password) and empty($password_next)){
        $message = 'パスワードを入力してください';
        header("Location: ../Front/index.php?message=$message");
        exit;
    }elseif ($password !== $password_next) {
        $message = 'パスワードが一致しません';
        header("Location: ../Front/index.php?message=$message");
        exit;
        }
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        $sql = "SELECT * FROM info WHERE mail = :mail AND password = :password";
            //$sql = "SELECT * FROM info WHERE id = 1";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        $statement = null;
        $pdo = null;
        // echo $result['mail'];
        // echo $result['name'];

        if($result){
            $table_name = $result['table_name'];
            Insert_Info_store($table_name);
            header("Location: ../Front/main.php");
            exit;
        }else{
            $message = 'ログイン失敗';
            header("Location: ../Front/index.php?message=$message");
            exit;
        }
    
//



