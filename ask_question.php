<?php

require_once("common.php");

$categoryId = 1;

if (isset($_GET["category_id"])) {
  $categoryId = (int)$_GET["category_id"];
}

require_once("db/category_queries.php");
require_once("db/tag_queries.php");

$categories = getAllCategories($db);
$tags = getAllTags($db);
var_dump($tags);

if (isset($_POST["title"], $_POST["body"])) {
  $title = $_POST["title"];
  $body = $_POST["body"];
  $category = $_POST["category"];
  $existingTags = isset($_POST["existingTags"]) ? $_POST["existing_tags"] : [];
  $newTags = explode(',', $_POST["new_tags"]);

  require_once("db/question_queries.php");

  $result = createQuestion($db, $userId, $title, $body, $category, $existingTags, $newTags);

  var_dump($result);
}

require_once("templates/ask_question_form.php");