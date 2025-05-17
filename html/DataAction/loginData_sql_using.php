<?
        //テーブルの作製
    function make_table_Info_store(){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

            $sql = "CREATE TABLE  IF NOT EXISTS  InfoStore (
                table_name VARCHAR(60) NOT NULL,
                id INTEGER DEFAULT 1 
                )";
            $pdo->query($sql);
            } catch (PDOException $e){
                exit ($e->getMessage());
                #echo '接続できません';
            }
    }

    function Insert_Info_store($table_name){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
            $sql = "INSERT INTO  InfoStore 
                        (id, table_name)
                    VALUES  
                        (1, :table_name )";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':table_name', $table_name, PDO::PARAM_STR);
            $statement->execute();

            }catch(PDOException $e){
                exit ($e->getMessage());
                echo '接続できません';
            }
    }

  //データの取り出し
    function Pic_InfoStore(){
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql = 'SELECT * FROM InfoStore';
                
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $statement = null;
                $pdo = null;
                $InfoStore = [];
                $InfoStore[] = $row;
                //echo var_dump( $InfoStore[0]['table_name']);
            if ($InfoStore[0]['table_name']){
                       return  $InfoStore[0]['table_name'];//$InfoStore[0];
                    }
        
    }

//データの削除
    function Delete_Info_store(){
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
            $sql = "DELETE FROM InfoStore";
            $statement = $pdo->prepare($sql);
            $pdo->query($sql);
            $statement->execute();
    }

