<?php

function getAnswersByQuestionId(PDO $db, int $id): array
{
  $query = "
    SELECT
      a.id,
      a.body,
      a.created_on,
      u.username AS 'author_name'
    FROM
      answers AS a
    INNER JOIN
      users AS u
    ON
      a.author_id = u.id
    WHERE
      a.question_id = ?
  ";

  $stmt = $db->prepare($query);
  $stmt->execute([$id]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function answer(PDO $db, int $questionId, int $userId, string $body)
{
  $query = "
    INSERT INTO
      answers (
        body,
        author_id,
        question_id
      )
    VALUES (
      ?,
      ?,
      ?
    ); 
  ";

  $stmt = $db->prepare($query);
  $stmt->execute([$body, $userId, $questionId]);
}