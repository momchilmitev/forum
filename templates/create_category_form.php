<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
</head>
<body>
<?php require_once('templates/logout.php'); ?>
<a href="<?= url("categories.php"); ?>">Back to categorises</a>
  <form method="POST" action="">
    Name: <input type="text" name="name"><br>
    <input type="submit" value="Create">
  </form>
</body>
</html>