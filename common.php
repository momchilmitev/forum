<?php
  require_once('db/db.php');
  require_once('db/user_queries.php');

  if (!isset($_GET["authId"])) {
    header("Location: login.php");
    exit;
  }

  $authId = $_GET["authId"];
  $userId = getUserByAuthId($db, $authId);

  if ($userId == -1) {
    header("Location: login.php");
    exit;
  }

  function url (string $url): string {
    if (strstr($url, "?")) {
      return $url . '&authId=' . $_GET["authId"];
    }

    return $url . '?authId=' . $_GET["authId"];
  }