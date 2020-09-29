<?php

require_once('db/db.php');

$response = '';
$username = '';
$password = '';

if (isset($_POST["username"], $_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once('db/user_queries.php');
  $result = verifyCredentials($db, $username, $password);
  var_dump($result);
}

require_once('templates/login_form.php');
