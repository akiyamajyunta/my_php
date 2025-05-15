<?
    //テーブルの作製
    function make_table_info(){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

            $sql = "CREATE TABLE  IF NOT EXISTS  info (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(60) NOT NULL,
                table_name VARCHAR(60) NOT NULL,
                mail VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
                )";

            $pdo->query($sql);

            } catch (PDOException $e){
                exit ($e->getMessage());
                #echo '接続できません';
            }
    }
//ランダムな文字列の生成
            const RANDOM_CHARS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                    function random_string($length) {
                    $shuffled_chars = str_shuffle(RANDOM_CHARS);
                    $random_string = substr($shuffled_chars, 0, $length);
                    return $random_string . 's';
            }
//個人情報情報のテーブルへのs挿入、   
        function info_table_insert_data(){
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                if ($_GET) {
                if (($_GET['name'] === '') and ($_GET['mail'] === '')and ($_GET['password'] === '')){
                    header("Location: index.php");
                    exit();
                } else if ($_GET['name'] === '') {
                    header("Location: index.php");
                    exit();
                } else if ($_GET['mail'] === '') {
                    header("Location: index.php");
                }else if ($_GET['password'] === '') {
                    header("Location: index.php");
                }else {
                    $name    = $_GET['name'];
                    $table_name  =  random_string(29);
                    $mail = $_GET['mail'];
                    $password = $_GET['password'];
                    
                    $sql = "INSERT INTO info
                                (name, table_name, mail, password) 
                            VALUES 
                                (:name , :table_name, :mail, :password)";

                    $statement = $pdo->prepare($sql);

                    $statement->bindValue(':name', $name, PDO::PARAM_STR);
                    $statement->bindValue(':table_name', $table_name, PDO::PARAM_STR);
                    $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
                    $statement->bindValue(':password', $password, PDO::PARAM_STR);

                    $statement->execute();
                    header("Location: ../Front/index.php");
                    exit();
                }

            }
        }
//ログインしてデータの照合(ログイン機能) 
        function login_Check($email,$password){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "SELECT * FROM info WHERE mail = :mail AND password = :password";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':mail', $email, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);

        $statement->execute();     
        
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result){

            header("Location: ../Front/main.php");
            exit;
        } else {
            header("Location: ../Front/index.php");
        }
//Insert_Info_store($table_name)
}

//個人情報情報を出す(table_nameより)
    function put_user_info($table_name){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "SELECT * FROM info WHERE  table_name = : table_name ";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':table_name', $table_name, PDO::PARAM_STR);

        $statement->execute();     
        
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result){
            $name = $result['name'];
            $mail = $result['mail'];
            return array($name, $mail);
        } else {
            return false;
        }

}