<?php
session_start();
//0.外部ファイル読み込み
include('functions.php');
chk_ssid();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="select.php">データ管理</a>
      <a class="navbar-brand" href="index.php">ブックマーク登録</a>
      <? if( $_SESSION['kanri_flg'] == 1 ){ ?>
      <a class="navbar-brand" href="user_select.php">ユーザー管理</a>
      <a class="navbar-brand" href="user_index.php">ユーザー登録</a>
  <? } ?>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍登録</legend>
     <label>書籍名：<input type="text" name="book_name"></label><br>
     <label>書籍URL：<input type="text" name="book_url"></label><br>
     <label>書籍コメント：<input type="text" name="book_coment"></label><br>
     <label>登録日時：<input type="text" name="book_date"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
