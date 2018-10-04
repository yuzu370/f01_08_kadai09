<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST['book_name']) || $_POST['book_name']=='' ||
  !isset($_POST['book_url']) || $_POST['book_url']=='' ||
  !isset($_POST['book_coment']) || $_POST['book_coment']=='' ||
  !isset($_POST['book_date']) || $_POST['book_date']==''
){
  exit('ParamError');
}

//1. POSTデータ取得
$id     = $_POST['id'];
$book_name   = $_POST['book_name'];
$book_url  = $_POST['book_url'];
$book_coment = $_POST['book_coment'];
$book_date = $_POST['book_date'];

//2. DB接続します(エラー処理追加)
include('functions.php');
$pdo = db_conn();


//3．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE '. $table .' SET book_name=:a1, book_url=:a2, book_coment=:a3 WHERE id=:id');
$stmt->bindValue(':a1', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':a3', $book_coment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  header('Location: select.php');
  exit;
}
?>
