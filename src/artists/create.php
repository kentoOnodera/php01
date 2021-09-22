<?php
//DB接続
function dbConnect(){

  $link = mysqli_connect('db','book_log','pass','book_log');
  if(!$link){
    echo '接続できません'.PHP_EOL;
    echo 'Debugging error:  '.mysqli_connect_error().PHP_EOL;
    exit;
  }
  //リターンで$link;を返して外で使えるようにする
  return $link;
}
//テーブル削除
// function dropTable($link){
//   $dropTableSql = 'DROP TABLE IF EXISTS artists';
//   $result = mysqli_query($link,$dropTableSql);
//   if($result){
//     echo 'テーブルを削除しました。'.PHP_EOL;
//   }else{
//     echo 'テーブル削除に失敗しました。'.PHP_EOL;
//   }
// }
//テーブル作成
// function createTable($link){
//   $createTableSql = <<<ENT
//   CREATE TABLE artists(
//     id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
//     name VARCHAR(255),
//     place VARCHAR(255), 
//     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
//   )DEFAULT CHARACTER SET=utf8mb4;
//   ENT;
//   $result = mysqli_query($link,$createTableSql);
//   if($result){
//     echo 'テーブルを作成しました。'.PHP_EOL;
//   }else{
//     echo 'テーブル作成に失敗しました。'.PHP_EOL;
//   }
// }
  //$linkにdbConnect();で返した$linkを格納して他の関数でも使用できる用にする
  $link = dbConnect();
  // dropTable($link);
  // createTable($link);
  // mysqli_close($link);

if($_SERVER['REQUEST_METHOD']==='POST'){
  //  POSTされたアーティスト情報を変数に格納
  $artist = [
    'name' => $_POST['name'],
    'place' => $_POST['place']
  ];
  var_dump($artist);
}

function createCompany($link,$artist){
  $sql = <<<EOT
  INSERT INTO artists(
    name,
    place
  )VALUES(
    "{$artist['name']}",
    "{$artist['place']}"
  )
  EOT;
  $result = mysqli_query($link, $sql);
  if($result){
    echo '登録しました' . PHP_EOL;
  }else{
    echo '登録に失敗しました。' . PHP_EOL;
  }
}

$link = dbConnect();
//  データベースにデータを登録
createCompany($link,$artist);
//  データベースとの接続を切断
mysqli_close($link);
header("Location: index.php");
?>
