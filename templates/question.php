<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
</head>
<body>
  <a href="<?= url("category.php?id={$question['category_id']}"); ?>">Back to questions in this category</a>
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
  <form method="post">
    Your answer here: <br>
    <textarea name="body" cols="30" rows="10"></textarea><br>
    <input type="submit" value="answer" name="answer">
  </form>
</body>
</html>