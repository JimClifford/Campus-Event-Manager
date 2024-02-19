<?php
/**
 * This file contains the functions to handle the registration process
 */
declare(strict_types=1);

/**
 * This function checks if the username is wrong
 * 
 * @param bool|array $result  The result of the query
 * @return bool  True if the username is wrong, false if it is not
 */

function is_input_empty(string $username, string $email, string $pwd){
    if (empty($username) || empty($email) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}

function is_username_wrong(bool|array $result){
    if ($result === false){
        return true;
    }
    return false;

}


/**
 * This function checks if the email is invalid
 * 
 * @param string $email The email entered by the user
 * @return bool True if the email is invalid, false if it is not
 */

function is_email_invalid(string $email){
   //check if the email ends with .ashesi.edu.gh 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_array = explode('@', $email);
        if (!end($email_array) == 'ashesi.edu.gh'){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
/**
 * This function checks if the email is already registered
 * 
 * @param object $pdo The database connection
 * @param string $email The email entered by the user
 * @return bool True if the email is already registered, false if it is not
 */

function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}
function is_username_taken(object $pdo, string $username){
    if(get_user($pdo, $username)){
        return true;
    }else{
        return false;
    }
}
/**
 * This function checks if the input is empty
 * 
 * @param string $username The username entered by the user
 * @param string $pwd The password entered by the user
 * @return bool True if the input is empty, false if it is not
 */

function check_registration_errors(){
    if (isset($_SESSION['errors_register'])){
        $errors = $_SESSION['errors_register'];
        
        echo '<br>';

        foreach ($errors as $error){
            echo '$error';
        }

        unset($_SESSION['errors_register']);
    }else if(isset($_GET['register ']) && $_GET['register'] == 'success'){
        echo '<br>';
        echo 'Registration successful!';

    }

}
/**
 * This function creates a new user
 * 
 * @param object $pdo The database connection
 * @param string $username The username entered by the user
 * @param string $email The email entered by the user
 * @param string $pwd The password entered by the user
 */

function create_user(object $pdo, string $username, string $email, string $pwd){
    set_user( $pdo, $username, $email,  $pwd); 
    
}