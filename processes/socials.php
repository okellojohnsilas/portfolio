<?php
// Include process config file
include 'process_config.php';
// -------------------------- MANAGE SOCIAL MEDIA SECTION ---------------------------------------
if (isset($_POST['add_new_social'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/feedback/contact_information';
    // Perform a security token check
    token_check($_POST['add_new_social_token'], $_SESSION['add_new_social_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $social_name = mysqli_real_escape_string($dbconn, $_POST['social_name']);
    $social_icon = stripslashes(mysqli_real_escape_string($dbconn, $_POST['social_icon']));
    $social_link = mysqli_real_escape_string($dbconn, $_POST['social_link']);
    $query = "INSERT INTO social_links (social,link,icon,affected) VALUES (?, ?, ?, ?)";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ssss", $social_name,$social_link,$social_icon, $user);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Edit social link
if (isset($_POST['edit_social'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/feedback/contact_information';
    // Perform a security token check
    token_check($_POST['edit_social_token'], $_SESSION['edit_social_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $id = strtolower(mysqli_real_escape_string($dbconn, $_POST['social_id']));
    $social_name = mysqli_real_escape_string($dbconn, $_POST['social_name']);
    $social_link = mysqli_real_escape_string($dbconn, $_POST['social_link']);
    $social_icon = stripslashes(mysqli_real_escape_string($dbconn, $_POST['social_icon']));
    // Get social details or use default values
    $social_data = get_item_data($dbconn, "social_links", " where id = '$id'");
    $social_name = empty($social_name) ? $social_data['social'] : $social_name;
    $social_link = empty($social_link) ? $social_data['link'] : $social_link;
    $social_icon = empty($social_icon) ? $social_data['icon'] : $social_icon;
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE social_links set social=?, link=?, icon=?, affected=? where id=?";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "sssss", $social_name,$social_link,$social_icon, $user, $id);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Deactivate social link
if (isset($_GET["deactivate_social"])) {
    // Define the redrection URL
    $redirect = base_url() . 'admin/feedback/contact_information';
    // Variable declaration
    $id = $_GET["deactivate_social"];
    $status = 0;
    // Prepare the SQL insert query using a prepared statement	
    $query = "UPDATE social_links SET status=? WHERE id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Activate social link
if (isset($_GET["activate_social"])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/feedback/contact_information';
    // Variable declaration
    $id = $_GET["activate_social"];
    $status = 1;
    // Prepare the SQL insert query using a prepared statement	
    $query = "UPDATE social_links SET status=? WHERE id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Delete social link
if (isset($_GET["delete_social"])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/feedback/contact_information';
    // Variable declaration
    $id = $_GET["delete_social"];
    $status = 0;
    $deleted = 1;
    // Prepare the SQL insert query using a prepared statement	
    $query = "UPDATE social_links SET deleted=?, status=? WHERE id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "sss", $deleted,$status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}
$dbconn->close();
?>