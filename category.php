<?php

require_once('common.php');

if (!isset($_GET["id"])) {
  header("Location: categories.php");
  exit;
}

$id = $_GET["id"];

require_once("db/category_queries.php");

if (isset($_GET["action"], $_GET["question_id"])) {
  $action = $_GET["action"];
  $questionId = $_GET["question_id"];

  if ($action === 'like') {
    like($db, $userId, $questionId);
  } else {
    dislike($db, $userId, $questionId);
  }
}

$questions = getQuestionsByCategoryId($db, $id);

require_once("templates/questions_by_category.php");