<?php

//try {
  // (1)データベースへ接続
  #$dbh = new PDO("mysql:host=127.0.0.1; dbname=test; charset=utf8", 'username', 'password');
//$dbh = new PDO("mysql:host=localhost; dbname=test; charset=utf8", 'root', 'root');

  // (2)テーブル作成のSQLを作成
  // $sql = 'CREATE TABLE mydata (
  //   id INT(11) AUTO_INCREMENT PRIMARY KEY,
  //   name VARCHAR(20),
  //   age INT(11),
  // ) engine=innodb default charset=utf8';

  // (3)SQLを実行
  // $res = $dbh->query($sql);

// } catch(PDOException $e) {

//   echo $e->getMessage();
//   die();
// }

// (4)接続を解除
//$dbh = null;