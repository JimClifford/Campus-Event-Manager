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
function is_username_wrong(bool|array $result){
    if ($result === false){
        return true;
    }
    return false;
}

/**
 * This function checks if the password is wrong
 * 
 * @param string $pwd The password entered by the user
 * @param string $hashed_pwd The hashed password from the database
 * @return bool True if the password is wrong, false if it is not
 */

function is_password_wrong(string $pwd, string $hashed_pwd){
   if (!password_verify($pwd, $hashed_pwd)){
       return true;
   }
   else{
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

function is_input_empty(string $username, string $pwd){
    if (empty($username) || empty($pwd)){
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

function check_login_errors(){
    if (isset($_SESSION['errors_login'])){
        $errors = $_SESSION['errors_login'];
        
        echo '<br>';

        foreach ($errors as $error){
            echo $error;    //Display the errors
        }

        unset($_SESSION['errors_login']);  //Unset the session variable
    }else if(isset($_GET['login']) && $_GET['login'] == 'success'){
        echo '<br>';
        echo 'Login successful!';  //Display a success message

    }

}
