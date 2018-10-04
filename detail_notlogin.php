<?php
// getで送信されたidを取得
$id = $_GET['id'];
// echo "GET:".$id;


//1.  DB接続します
include('functions.php');
$pdo = db_conn();

//２．データ登録SQL作成，指定したidのみ表示する
$stmt = $pdo->prepare('SELECT * FROM '. $table .' WHERE id=:id');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false){
  // エラーのとき
  errorMsg($stmt);
}else{
  // エラーでないとき
  $rs = $stmt->fetch();
  // fetch()で1レコードを取得して$rsに入れる
  // $rsは配列で返ってくる．$rs["id"], $rs["name"]などで値をとれる
  // var_dump()で見てみよう
}
?>

<!-- htmlは「index.php」とほぼ同じです -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>詳細ページ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select_notlogin.php">ブックマーク一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>詳細ページ</legend>
     <label>書籍名：<?=$rs['book_name']?></label><br>
     <label>書籍URL：<?=$rs['book_url']?></label><br>
     <label>書籍コメント：<?=$rs['book_coment']?></label><br>
     <label>登録日時： <?=$rs['book_date']?></label><br>
     <!--<input type="submit" value="送信"> -->
     <!-- idは変えたくない = ユーザーから見えないようにする-->
     <input type="hidden" name="id" value="<?=$rs['id']?>"> 
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
