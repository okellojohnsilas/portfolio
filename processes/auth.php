<?php
    // Include process config file
    include 'process_config.php';
    // -------------------------- AUTH SECTION ---------------------------------------//
    if (isset($_POST["login"])) {
        // Redirect URL
        $redirect = base_url() . 'auth';
        // Security token validation
        token_check($_POST['login_token'], $_SESSION['login_token'], $redirect);
        // Escape user input
        $email = mysqli_real_escape_string($dbconn, $_POST['email']);
        $password = mysqli_real_escape_string($dbconn, $_POST['password']);
        // Check if user exists using a prepared statement
        $stmt = $dbconn->prepare("SELECT * FROM `users`, user_auth where users.id = user_auth.user and users.email  = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();
                $storedPassword = $userData["password"];
                if (password_verify($password, $storedPassword)) {
                    // Fetch IP and location details
                    $ip = getIPAddress();
                    $login_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
                    $hostname = $login_details->hostname ?? '';
                    $location = $login_details->loc ?? '';
                    $isp = $login_details->org ?? '';
                    $city = $login_details->city ?? '';
                    $region = $login_details->region ?? '';
                    $country = $login_details->country ?? '';
                    $phone = $login_details->phone ?? '';
                    // Log login details
                    $logStmt = $dbconn->prepare("INSERT INTO user_login (user, ip, hostname, location, ISP, city, region, country, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $logStmt->bind_param("sssssssss", $email, $ip, $hostname, $location, $isp, $city, $region, $country, $phone);
                    $logStmt->execute();
                    $logStmt->close();
                    // Set session control
                    $_SESSION["control"] = $userData;
                    $_SESSION["success"] = "Login Successful.";
                    // Redirect to admin page
                    header('Location: ' . base_url() . 'admin/');
                    exit();
                } else {
                    unset($_SESSION["control"]);
                    $_SESSION["error"] = "Incorrect password.";
                    header('Location: ' . $redirect);
                    exit();
                }
            } else {
                unset($_SESSION["control"]);
                $_SESSION['error'] = 'Unknown user.';
                header('Location: ' . $redirect);
                exit();
            }
        } else {
            unset($_SESSION["control"]);
            $_SESSION['error'] = 'Database error: ' . $dbconn->error;
            header('Location: ' . $redirect);
            exit();
        }
    }

    // staff_login_token
    // User log out
    if (isset($_GET["logout"])) {
        $redirect = base_url();
        unset($_SESSION["control"]);  
        header('Location: '.$redirect);
        exit();
    }

$dbconn->close();
?>