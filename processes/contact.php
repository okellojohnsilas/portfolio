<?php
// Include process config file
include 'process_config.php';
// -------------------------- CONTACT SECTION ---------------------------------------
// Send feedback form data to the database
if (isset($_POST['send_feedback'])) {
    // Define the redirection URL
    $redirect = base_url() . '/contact';
    // Perform a security token check
    token_check($_POST['contact_us_token'], $_SESSION['contact_us_token'], $redirect);
    // Sanitize user input
    $name = mysqli_real_escape_string($dbconn, $_POST['name']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $subject = mysqli_real_escape_string($dbconn, $_POST['subject']);
    $message = mysqli_real_escape_string($dbconn, $_POST['message']);
    // h captcha
    $recaptchaResponse = $_POST['h-captcha-response'];
    // h captcha
    // Make a POST request to hCaptcha's verification endpoint
    $url = 'https://hcaptcha.com/siteverify';
    $data = [
        'secret' => $hcaptcha_secret,
        'response' => $recaptchaResponse,
    ];
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);
    if ($response['success']) {
        // Prepare the SQL insert query using a prepared statement
        $query = "insert into contact_data (name,email,subject,message) values (?, ?, ?, ?)";
        // Create a prepared statement
        $stmt = mysqli_prepare($dbconn, $query);
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect, $success_message = "Your message has been recieved successfully!", $error_message = "Failed to send your message. Please try again later.");
    } else{
        $_SESSION['error'] = "Check the 'I am human test on the contact form as you submit the form.";
        header('Location: '.$redirect); 
        exit();
    }
}

$dbconn->close();
?>