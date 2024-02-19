<?php
/**
 * This file contains the functions to handle the registration process
 */
declare(strict_types=1); //Strict typing

/**
 * This function checks if the input is empty
 * 
 * @param string $username The username entered by the user
 * @param string $email The email entered by the user
 * @param string $pwd The password entered by the user
 * @return bool True if the input is empty, false if it is not
 */
function get_email(object $pdo,  string $email){
    $query = 'SELECT username FROM users WHERE email = :email';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_username(object $pdo,  string $username){
    $query = 'SELECT username FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * This function checks if the email is already registered
 * 
 * @param object $pdo The database connection
 * @param string $email The email entered by the user
 * @return bool True if the email is already registered, false if it is not
 */
function set_user(object $pdo, string $username, string $email, string $pwd){
    $query = 'INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :pwd)';
    $stmt = $pdo->prepare($query);


    $options = [
        'cost' => 12,  
    ]; 

    $hashed_password = password_hash($pwd, PASSWORD_BCRYPT, $options); //Hash the password


    //Bind the parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pwd', $hashed_password);
    $stmt->execute();
} 