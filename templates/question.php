<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
</head>
<body>
  <div>
    <h2>
      Title: <?= $question['title'] ?>
    </h2>
    <p>Content:</p>
    <p>
      <?= $question['body'] ?>
    </p>
    <span>Asked by: <?= $question['author_name'] ?></span><br>
    <span>On: <?= $question['created_on'] ?></span><br>
    <span>Category: <?= $question['category_name'] ?></span><br>
  </div>
  <hr>

  <?php foreach($answers as $answer): ?>
    <div>
      <div>By: <?= $answer['author_name'] ?></div>
      <div><?= $answer['body'] ?></div>
    </div>
    <hr>
  <?php endforeach; ?>
</body>
</html>