<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
</head>
<body>
  <?php require_once('templates/logout.php'); ?>
  <a href="<?= url("categories.php?"); ?>">Back to all categories</a><br>
  <a href="<?= url("ask_question.php?category_id=$id") ?>">Ask new question</a>
  <hr>

  <?php foreach($questions as $question): ?>
    <div>
      <h2>
        <a href="<?= url("question.php?id={$question['id']}") ?>">
          <?= $question['title'] ?>
        </a>
        (<?= $question['answers_count'] ?>)
      </h2>
      <span><?= $question['author_name'] ?></span>
      <span><?= $question['created_on'] ?></span>
      <span><?= $question['category_name'] ?></span><br>
      <span>Likes: <?= $question['likes_count'] ?></span>
    </div>
    <div>
      <?php if (hasLike($db, $userId, $question['id'])): ?>
        <a href="<?= url("category.php?id={$_GET["id"]}&action=dislike&question_id={$question['id']}"); ?>">dislike</a>
      <?php else: ?>
        <a href="<?= url("category.php?id={$_GET["id"]}&action=like&question_id={$question['id']}"); ?>">like</a>
      <?php endif; ?>
    </div>
    <hr>
  <?php endforeach; ?>
</body>
</html>