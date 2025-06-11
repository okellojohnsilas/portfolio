<?php
// Include process config file
include 'process_config.php';
// Define the redirection URL
$redirect = base_url() . 'admin/site/specialities';
// -------------------------- MANAGE SPECIALITY MEDIA SECTION ---------------------------------------
if (isset($_POST['add_speciality'])) {
    // Perform a security token check
    token_check($_POST['add_speciality_token'], $_SESSION['add_speciality_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $speciality_name = trim(mysqli_real_escape_string($dbconn, $_POST['speciality_name']));
    $speciality_icon = trim(stripslashes(mysqli_real_escape_string($dbconn, $_POST['speciality_icon'])));
    if (check_if_record_exists($dbconn, "select * from specialities where speciality = '$speciality_name' and deleted = 0")) {
        $_SESSION["error"] = "Name already exists.";
        header("Location: $redirect");
        exit();
    }
    $query = "INSERT INTO specialities (speciality,icon,affected) VALUES (?, ?, ?)";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "sss", $speciality_name, $speciality_icon, $user);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Edit speciality link
if (isset($_POST['edit_speciality'])) {
    // Perform a security token check
    token_check($_POST['edit_speciality_token'], $_SESSION['edit_speciality_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $id = mysqli_real_escape_string($dbconn, $_POST['speciality_id']);
    $speciality_name = trim(mysqli_real_escape_string($dbconn, $_POST['speciality_name']));
    $speciality_icon = trim(stripslashes(mysqli_real_escape_string($dbconn, $_POST['speciality_icon'])));
    // Get speciality details or use default values
    $speciality_data = get_item_data($dbconn, "specialities", " where id = '$id'");
    // print ($speciality_data);
    $speciality_name = empty($speciality_name) ? $speciality_data['speciality'] : $speciality_name;
    $speciality_icon = empty($speciality_icon) ? $speciality_data['icon'] : $speciality_icon;
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE specialities SET speciality=?, icon=?, affected=? where id=?";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ssss", $speciality_name, $speciality_icon, $user, $id);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Deactivate speciality link
if (isset($_GET["deactivate_speciality"])) {
    // Variable declaration
    $id = $_GET["deactivate_speciality"];
    $status = 0;
    // Prepare the SQL insert query using a prepared statement	
    $query = "UPDATE specialities SET status=? WHERE id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Activate speciality link
if (isset($_GET["activate_speciality"])) {
    // Variable declaration
    $id = $_GET["activate_speciality"];
    $status = 1;
    // Prepare the SQL insert query using a prepared statement	
    $query = "UPDATE specialities SET status=? WHERE id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Delete speciality link
if (isset($_GET["delete_speciality"])) {
    // Variable declaration
    $id = $_GET["delete_speciality"];
    $status = 0;
    $deleted = 1;
    // Prepare the SQL insert query using a prepared statement	
    $query = "UPDATE specialities SET deleted=?, status=? WHERE id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "sss", $deleted, $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}
$dbconn->close();
?>