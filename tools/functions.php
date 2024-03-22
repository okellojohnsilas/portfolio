<?php
    /* Language and trasnlation section start */ 
    require 'vendor/autoload.php';
    use Stichoza\GoogleTranslate\GoogleTranslate;
    // Function to get preferred language from browser
    function getPreferredLanguage() {
        // Check if 'HTTP_ACCEPT_LANGUAGE' header is set
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            // Parse the 'HTTP_ACCEPT_LANGUAGE' header
            $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            // Loop through the parsed languages
            foreach ($languages as $lang) {
                // Extract the language code and quality
                $lang = explode(';', $lang)[0];
                // Return the first language code found
                return $lang;
            }
        }
        // Default language if none found
        return 'en'; // English
    }

    // Function to set preferred language cookie
    function setPreferredLanguageCookie() {
        // Check if the preferred language cookie is already set
        if (!isset($_COOKIE['preferred_language'])) {
            // Get preferred language
            $preferredLanguage = getPreferredLanguage();
            // Check if the preferred language is among the allowed languages
            $allowedLanguages = array('en', 'es', 'fr', 'de', 'it', 'pt', 'ja', 'ko', 'zh-CN', 'zh-TW', 'ru', 'ar', 'hi');
            if (!in_array($preferredLanguage, $allowedLanguages)) {
                $preferredLanguage = 'en'; // Set default to English if not found in the list
            }
            // Set the preferred language as a cookie for 30 days
            setcookie("preferred_language", $preferredLanguage, time() + (86400 * 30), "/"); // 86400 * 30 = 30 days
        } else {
            // Get the existing preferred language from the cookie
            $existingLanguage = $_COOKIE['preferred_language'];
            // Check if the existing language is among the allowed languages
            $allowedLanguages = array('en', 'es', 'fr', 'de', 'it', 'pt', 'ja', 'ko', 'zh-CN', 'zh-TW', 'ru', 'ar', 'hi');
            if (!in_array($existingLanguage, $allowedLanguages)) {
                $existingLanguage = 'en'; // Set default to English if not found in the list
            }
            // Get the preferred language from browser
            $preferredLanguage = getPreferredLanguage();
            // Check if the existing language is different from the preferred language
            if ($existingLanguage !== $preferredLanguage) {
                // Set the preferred language as a cookie for 30 days
                setcookie("preferred_language", $preferredLanguage, time() + (86400 * 30), "/"); // 86400 * 30 = 30 days
            }
        }
    }
    // Translate text
    function translate_text($text,$lang){
       return GoogleTranslate::trans($text, $lang, 'en');
    }
    /* Language and trasnlation section end */
    // Hide element on mobile
    function hide_on_mobile(){
        print 'd-none d-sm-block d-sm-none d-md-block';
    }
     
    // Display only on mobile
    function display_on_mobile_only(){
        print 'd-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none';
    }
?>