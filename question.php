<?php

require_once('common.php');

if (!isset($_GET["id"])) {
  header("Loaction: " . url("categories.php"));
  exit;
}

$id = $_GET["id"];

require_once("db/question_queries.php");
require_once("db/answer_queries.php");

$question = getQuestionById($db, $id);
$answers = getAnswersByQuestionId($db, $id);

if (isset($_POST["answer"])) {
  $body = htmlspecialchars($_POST["body"]);
  answer($db, $id, $userId, $body);
  header("Location: " . url($_SERVER['PHP_SELF'] . "?id={$id}"));
  exit;
}

require_once('templates/question.php');