<?php

require_once('common.php');

if (!hasRole($db, $userId, 'ADMIN')) {
  header("location: " . url("logout.php"));
  exit;
}

if (isset($_POST["name"])) {
  $name = htmlspecialchars($_POST["name"]);
  require_once('db/category_queries.php');
  createCategory($db, $name);
  header("Location: " . url("categories.php"));
  exit;
}

require_once('templates/create_category_form.php');
