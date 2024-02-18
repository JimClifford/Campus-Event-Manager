<?php

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
        if ( is_email_registered($pdo, $email)){
            $errors["email_registered"] = "Email already registered!";

        } 
        require_once '../settings/config_session.php'; 

        if ($errors){
            
            $_SESSION['errors_register'] = $errors;
            header('Location: ../index.php');
            die();

        }

        create_user($pdo, $username, $email, $pwd);
        header('Location: ../index.php?register=success');
        $pdo = null;
        $stmt = null;
        die()  ;


    }catch(PDOException $e){
        die('Query failed: ' . $e->getMessage());
    } 


}else{
    header('Location: ../index.php');
    die();
}