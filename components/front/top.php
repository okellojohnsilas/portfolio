<?php 
    include "tools/functions.php";
    include "config/config.php";
    /* Start of Language Preferences */ 
    // Check if the name variable is set in the URL
    if (isset($_GET['lang'])) {
        $language = setcookie("preferred_language", $_GET['lang'], time() + (86400 * 30), "/"); // 86400 * 30 = 30 days
    }
    // Call the function to set the preferred language cookie
    setPreferredLanguageCookie();
    // Retrieve the preferred language from the cookie
    // $language = substr($_COOKIE['preferred_language'], 0, 2); // Extract the first two characters
    // echo $language; // Print the preferred language    
?>
<!DOCTYPE html>
<html lang="<?php print $language; ?>">
<?php  include "components/front/head.php"; ?>

<body>
    <?php include 'components/front/navbar.php';?>