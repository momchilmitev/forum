<?php
  function verifyCredentials(PDO $db, string $username, string $password): int {
    $query = "
      SELECT 
        id,
        password
      FROM
        users
      WHERE
        username = ?
    ";

    $stmt = $db->prepare($query);
    if (!$stmt->execute([$username])) {
      return -1;
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $passwordHash = $user['password'];

    $result = password_verify($password, $passwordHash);

    if ($result) {
      return (int)$user['id'];
    }

    return -1;
  }

  function register(PDO $db, string $username, string $password): bool {
    $query = "
      INSERT INTO 
        users (username, password)
      VALUES (
        ?,
        ?
      )
    ";

    $statement = $db->prepare($query);
    $result = $statement->execute([
      $username,
      password_hash($password, PASSWORD_ARGON2I)
    ]);

    return $result;
  }
?>