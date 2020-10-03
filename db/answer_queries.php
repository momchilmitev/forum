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