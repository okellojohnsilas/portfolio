<?php
function base_url() 
{
    // Detect if running on localhost
    if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $folder = explode('/', trim($_SERVER['REQUEST_URI'], '/'))[0]; // first folder after domain
        return $protocol . '://' . $host . '/' . $folder . '/';
    } 
    else {
        // Production base URL
        return 'https://okellojohnsilas.com/';  // <-- Replace with your actual domain
    }
}


/* Start Session */
session_start();

// Update last activity time stamp
$_SESSION['LAST_ACTIVITY'] = time();

// Set timeout duration (30 minutes)
$timeout_duration = 1800; // seconds
/* Base Url */


// Check if the session variable exists
if (isset($_SESSION['LAST_ACTIVITY'])) {
  if (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration) {
    // Last request was more than 30 minutes ago — destroy session
    session_unset();
    session_destroy();
    header(base_url()); // redirect to login or wherever
    exit();
  }
}

/* Database connection */
// For Localhost
$dbconn = new mysqli('localhost', 'root', '', 'oj49');
// For Hpanel
// $dbconn = new mysqli('localhost', 'u612843622_oj49', 'oKwangap3l', 'u612843622_oj49');
// Application name
$app_name = "OKELLO JOHN SILAS";

?>