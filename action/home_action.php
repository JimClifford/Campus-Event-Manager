<?php
/**
 * This file contains the functions to handle the home page
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $search = $_POST['search'];

    try{
        require_once '../settings/connection.php';
        require_once '../function/home_model.php';
        

        $result = search($pdo, $search);

        if ($result){
            require_once '../settings/config_session.php'; 
            $_SESSION['search_result'] = $result;
            header('Location: ../view/home.php');
            die();
        }
        else{
            header('Location: ../view/home.php?search=error');
            die();
        }
       
    }
    catch(PDOException $e){
        die('Query failed: ' . $e->getMessage()); //If the query fails, display an error message
    }
}else{
    header('Location: ../view/home.php');
    die();
}