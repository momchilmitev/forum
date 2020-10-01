<?php

function getQuestionsByCategoryId(PDO $db, int $category_id): array {
  $query = "
    SELECT
      q.id,
      q.title
      q.author_id,
      q.create_on,
      u.username,
      c.name,
      COUNT(a.id) AS answers_id
    FROM
      questions AS q
    INNER JOIN
      users AS u
    ON
      q.author_id = u.id
    LEFT JOIN
      answers AS a
    ON
      q.id = a.question_id
    INNER JOIN
      categories AS c
    ON
      q.categorie_id = c.id
    WHERE
      c.id = ?
    GROUP BY
      q.id,
      q.title
      q.author_id,
      q.create_on,
      u.username,
      c.name
    ORDER BY
      q.created_on DESC,
      answers_count DESC
  ";

  $stmt = $db->prepare($query);
  $stmt->execute([$category_id]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCategories(PDO $db): array {
  $query = "
    SELECT
      c.id,
      c.name,
      COUNT(q.id) AS questions_count
    FROM
      categories AS c
    LEFT JOIN
      questions AS q
    ON
      c.id = q.category_id
    GROUP BY
      c.id,
      c.name
    ORDER BY
      questions_count DESC,
      c.name ASC
  ";

  return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
}