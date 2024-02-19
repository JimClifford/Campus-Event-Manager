<?php
/**
 * This file is the action file for the register form and it checks if the user input 
 * is valid and registers the user if it is.
 * 
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    try{

        require_once('../settings/connection.php');
        require_once('../function/register_model.php');
        require_once('../function/register_controller.php');

        //Error Handlers

        $errors = [];

        if ( is_input_empty($username, $email, $pwd)){
            $errors["empty_input"] = "Please fill in all fields!";

        }
        if ( is_email_invalid($email)){
            $errors["invalid_email"] = "Please enter a valid email!";

        }
        if (is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken!";

        }
        if ( is_email_registered($pdo, $email)){
            $errors["email_registered"] = "Email already registered!";

        } 
        require_once '../settings/config_session.php'; 

        if ($errors){
            
            $_SESSION['errors_register'] = $errors;

            header('Location: ../login/register_view.php');
            die();

        }
        /**
         * If there are no errors, register the user and redirect to the index page
         */

        create_user($pdo, $username, $email, $pwd);
        header('Location: ../login/login_view.php?register=success');
        $pdo = null;
        $stmt = null;
        die()  ;


    }catch(PDOException $e){
        die('Query failed: ' . $e->getMessage()); //If the query fails, display an error message
    } 


}else{
    header('Location: ../login/register_view.php'); //If the user tries to access this page without submitting the form, redirect to the index page
    die();
}