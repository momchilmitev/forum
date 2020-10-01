<?php

require_once('common.php');

if (!isset($_GET["id"])) {
  header("Location: categories.php");
  exit;
}

$id = $_GET["id"];

require_once("db/category_queries.php");

var_dump(getQuestionsByCategoryId($db, $id));

require_once("templates/questions_by_category.php");