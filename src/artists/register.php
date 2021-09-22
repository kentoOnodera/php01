

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>アーティスト情報の登録</h1>
  <form action="create.php" method="POST">
    <div>
      <label for="name">アーティスト名</label>
      <input type="text" id="name" name="name">
    </div>
    <div>
      <label for="place">活動場所</label>
      <input type="text" id="place" name="place">
    </div>
    <button type="submit">登録する</button>
  </form>
</body>
</html>
