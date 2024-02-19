<?php
/**
 * This file contains the configuration for the session
 */

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

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {

    if (!isset($_SESSION['LAST_ACTIVITY'])) { 
        regenerateSessionID_loggedIn();

    } else {
        $interval = 60 * 30; // 30 minutes
        if (time() - $_SESSION['LAST_ACTIVITY'] >= $interval) { 
            regenerateSessionID_loggedIn();  
        }
    }

} else {

    if (!isset($_SESSION['LAST_ACTIVITY'])) { 
        regenerateSessionID();
    } else {
        $interval = 60 * 30; // 30 minutes
        if (time() - $_SESSION['LAST_ACTIVITY'] >= $interval) { 
            regenerateSessionID();  
        }
    }

}

// Update the last activity time stamp for the user who is not logged in
function regenerateSessionID(){
    session_regenerate_id(true); 

    $_SESSION['LAST_ACTIVITY'] = time();
}

// Update the last activity time stamp for the user who is logged in
function regenerateSessionID_loggedIn(){
    session_regenerate_id(true); 
    $userID = $_SESSION['user_id'];
    $newSessionID = session_create_id();
    $session_id = $newSessionID . "_" . $userID;
    session_id($session_id);
    
    $_SESSION['LAST_ACTIVITY'] = time();
} 