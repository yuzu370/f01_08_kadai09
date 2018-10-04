<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST['book_name']) || $_POST['book_name']=="" ||
  !isset($_POST['book_url']) || $_POST['book_url']=="" ||
  !isset($_POST['book_coment']) || $_POST['book_coment']=="" ||
  !isset($_POST['book_date']) || $_POST['book_date']==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$book_name   = $_POST['book_name'];
$book_url  = $_POST['book_url'];
$book_coment = $_POST['book_coment'];
$book_date = $_POST['book_date'];

//2. DB接続します(エラー処理追加)
include('functions.php');
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO '. $table .'(id, book_name, book_url, book_coment, book_date )VALUES(NULL, :a1, :a2, :a3, sysdate())');
$stmt->bindValue(':a1', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':a3', $book_coment, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');
  exit;
}
?>
