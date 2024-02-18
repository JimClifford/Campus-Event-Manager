<?php

declare(strict_types=1);

function is_input_empty(string $username, string $email, string $pwd){
    if (empty($username) || empty($email) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}

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

function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}

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

function create_user(object $pdo, string $username, string $email, string $pwd){
    set_user( $pdo, $username, $email,  $pwd); 
    
}