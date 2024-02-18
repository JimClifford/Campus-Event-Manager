<?php

declare(strict_types=1);

function get_email(object $pdo,  string $email){
    $query = 'SELECT username FROM users WHERE email = :email';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $email, string $pwd){
    $query = 'INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :pwd)';
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12,
    ];
    $hashed_password = password_hash($pwd, PASSWORD_BCRYPT, $options);


    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pwd', $hashed_password);
    $stmt->execute();
} 