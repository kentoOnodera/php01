
<?php
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

  function listArtist($link){
    $artists = [];
    $sql = 'SELECT name,place FROM artists;';
    $result = mysqli_query($link, $sql);
    while($artist = mysqli_fetch_assoc($result)){
      $artists[] = $artist;
    }
    mysqli_free_result($result);
    return $artists;
  }
  $link = dbConnect();
  $artists = listArtist($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/css/uikit.min.css" /> -->
  <title>Document</title>
</head>
<body>
  <h1>アーティスト一覧</h1>
  <section class="uk-grid">
    <?php foreach ($artists as $artist) : ?>
      <div class="uk-width-1-3">
      <span>アーティスト名</span>
      <h2>
        <?php echo $artist['name'];?>
      </h2>
      <span>活動場所</span>
      <p><?php echo $artist['place'];?></p>
    </div>
    <?php endforeach; ?>
  </section>
</body>
</html>
