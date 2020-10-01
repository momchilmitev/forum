<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
</head>
<body>
  <form method="POST" action="">
    Title: <input type="text" name="title"><br>
    Questions: <br>
    <textarea name="body"></textarea><br>
    Category: <br>
    <select name="category">
      <?php foreach($categories as $category): ?>
        <option 
          <?= $category['id'] == $categoryId ? 'selected' : '' ?> 
          value="<?= $category['id']; ?>"
        >
          <?= $category['name']; ?> (<?= $category['questions_count']; ?>)
        </option>
      <?php endforeach; ?>
    </select> <br>
    Tags: <br>
    <select multiple="multiple" name="existing_tags[]">
      <?php foreach($tags as $tag): ?>
        <option value="<?= $tag['id'] ?>">
          <?= $tag['name']; ?> (<?= $tag['questions_count']; ?>)
        </option>
      <?php endforeach; ?>
    </select> <br>
    Add tags: <input type="text" name="new_tags" placeholder="Enter your tags separeted by comma ..."> <br>
    <input type="submit" value="Ask!">
  </form>
</body>
</html>