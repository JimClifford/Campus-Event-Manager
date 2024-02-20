<?php

/**
 * This file contains the functions to handle the home page
 */
declare(strict_types=1);

function search(object $pdo, string $search){
    $stmt = $pdo->prepare('SELECT * FROM events WHERE title LIKE :search');
    $stmt->bindValue(':search', '%'.$search.'%');
    $stmt->execute();
    $result = $stmt->fetchAll(); //Fetch the result
    return $result;
}

