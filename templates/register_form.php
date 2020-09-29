<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
</head>
<body>
  <form action="" method="post">
    Username: <input type="text" name="username"><br>
    Passwod: <input type="text" name="password"><br>
    <input type="submit" value="send">
  </form>
  <div id="response">
    <?= $response ?>
  </div>
</body>
</html>