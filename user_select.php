<?php
//1.  DB接続します
include('functions.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM '.$user_table);
$status = $stmt->execute();

//３．データ表示
$view='';
if($status==false){
  errorMsg($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="user_detail.php?id='.$result['id'].'">';  //更新ページへのaタグを作成
    $view .= $result['name'].'['.$result['lid'].']';
    $view .= '</a>';
    $view .= '';
    $view .= '<a href="user_delete.php?id='.$result['id'].'">';  //削除用aタグを作成
    $view .= '［削除］';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="select.php">ブックマーク管理</a>
      <a class="navbar-brand" href="index.php">ブックマーク登録</a>
      <a class="navbar-brand" href="user_select.php">ユーザー管理</a>
      <a class="navbar-brand" href="user_index.php">ユーザー登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
