<?php

ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies.
ini_set('session.use_strict_mode', 1); // Prevents attacks involved with session fixation.

// Set the session cookie parameters
session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (!isset($_SESSION['LAST_ACTIVITY'])){ 
    regenerateSessionID();

}else{
    $interval = 60 * 30; // 30 minutes
    if (time() - $_SESSION['LAST_ACTIVITY'] >= $interval){ 
        regenerateSessionID();  

    }
}

function regenerateSessionID(){
    session_regenerate_id(); 
    $_SESSION['LAST_ACTIVITY'] = time();
}