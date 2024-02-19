<?php
/**
 * This file contains the functions to handle the login process
 */
declare(strict_types=1);

/**
 * This function checks if the username is wrong
 * 
 * @param bool|array $result  The result of the query
 * @return bool  True if the username is wrong, false if it is not
 */
function get_user(object $pdo, string $username){
    $query = "SELECT * FROM users WHERE username = :username"; //Query to get the user from the database
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username); //Bind the parameter
    $stmt->execute(); //Execute the query
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC); //Fetch the result
    return $result;
}