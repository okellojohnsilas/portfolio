<?php
// Include process config file
include 'process_config.php';
// -------------------------- ADD SUB TAG SECTION ---------------------------------------
if (isset($_POST['add_sub_tag_word'])) {
    // Define the redirection URL
    $redirect = base_url() . '/admin/site/home';
    // Perform a security token check
    token_check($_POST['add_sub_tag_word_token'], $_SESSION['add_sub_tag_word_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $hero_sub_tag_word = strtolower(mysqli_real_escape_string($dbconn, $_POST['hero_sub_tag_word']));
    // Append new sub tag to the existing hero_sub_tag
    $updated_csv = append_csv_data($dbconn, "website_data", "hero_sub_tag_words", $hero_sub_tag_word, $redirect);
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE website_data SET hero_sub_tag_words=? LIMIT 1";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "s", $updated_csv);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect, $success_message = "Sub Tag Word Added", $error_message = "Failed to add a new subtag. Please try again later.");
}

// -------------------------- EDIT SUB TAG SECTION ---------------------------------------
if (isset($_POST['edit_sub_tag_word'])) {
    // Define the redirection URL
    $redirect = base_url() . '/admin/site/home';
    // Perform a security token check
    token_check($_POST['edit_sub_tag_word_token'], $_SESSION['edit_sub_tag_word_token'], $redirect);
    // Sanitize user input
    // $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $old_hero_sub_tag_word = (mysqli_real_escape_string($dbconn, $_POST['old_hero_sub_tag_word']));
    $new_hero_sub_tag_word = (mysqli_real_escape_string($dbconn, $_POST['new_hero_sub_tag_word']));
    // Append new sub tag to the existing hero_sub_tag
    $updated_csv = edit_csv_data($dbconn, "website_data", "hero_sub_tag_words", $old_hero_sub_tag_word, $new_hero_sub_tag_word, $redirect);
    print($new_hero_sub_tag_word);
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE website_data SET hero_sub_tag_words=? LIMIT 1";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "s", $updated_csv);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect, $success_message = "Sub Tag Word Edited", $error_message = "Failed to edit subtag. Please try again later.");
}

// -------------------------- DELETE SUB TAG SECTION ---------------------------------------
if (isset($_GET["delete_sub_tag_word"])) {
    // Define the redrection URL
    $redirect = base_url() . '/admin/site/home';
    // Variable declaration
    $tag_to_delete = strtolower($_GET["delete_sub_tag_word"]);
    print($tag_to_delete."<br>");
    $updated_csv = delete_csv_data($dbconn, "website_data", "hero_sub_tag_words", $tag_to_delete, $redirect);
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE website_data SET hero_sub_tag_words=? LIMIT 1";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "s", $updated_csv);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect, $success_message = "Sub Tag Word Deleted", $error_message = "Failed to delete subtag. Please try again later.");
}

// -------------------------- EDIT ABOUT ME TEXT SECTION ---------------------------------------
if (isset($_POST['edit_about_text'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/site/about';
    // Perform a security token check
    token_check($_POST['edit_about_text_token'], $_SESSION['edit_about_text_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $about_text = mysqli_real_escape_string($dbconn, $_POST['about_text']);
    $query = "UPDATE website_data SET about = ?, affected = ? LIMIT 1";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ss", $about_text, $user);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

if (isset($_POST['edit_email_address'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/feedback/contact_information';
    // Perform a security token check
    token_check($_POST['edit_email_address_token'], $_SESSION['edit_email_address_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $email_address = mysqli_real_escape_string($dbconn, $_POST['email_address']);
    // Use default email address if not provided
    $website_data = get_item_data($dbconn, "website_data", "");
    $email_address = empty($email_address) ? $website_data['contact_email'] : $email_address;
    $query = "UPDATE website_data SET contact_email = ?, affected = ? LIMIT 1";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ss", $email_address, $user);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}
// -------------------------- UPDATE LANDING PAGE HERO SECTION ---------------------------------------
if (isset($_POST['update_landing_page_hero'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/site/home';
    // Perform a security token check
    token_check($_POST['update_landing_page_hero_token'], $_SESSION['update_landing_page_hero_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $hero_tag = mysqli_real_escape_string($dbconn, $_POST['hero_tag']);
    $hero_sub_tag_statement = mysqli_real_escape_string($dbconn, $_POST['hero_sub_tag_statement']);
    // Handle Project hero_image Upload
    $hero_image = $_FILES['hero_image']['name'];
    $hero_image_type = $_FILES['hero_image']['type'];
    $hero_image_tmp_name = $_FILES['hero_image']['tmp_name'];
    $hero_imageImage = '';
    if (!empty($hero_image)) {
        if (!file_exists('../uploads/img/hero/')) {
            mkdir('../uploads/img/hero/', 0777, true);
        }
        $hero_image_path = '../uploads/img/hero/';
        $hero_imageImage = upload_file($dbconn, $hero_image, $hero_image_type, $hero_image_tmp_name, $redirect, $hero_image_path);
    }
    // Prepare the SQL insert query using a prepared statement
    $website_data = get_item_data($dbconn, "website_data", "");
    $hero_tag = empty($hero_tag) ? $website_data['hero_tag'] : $hero_tag;
    $hero_sub_tag_statement = empty($hero_sub_tag_statement) ? $website_data['hero_sub_tag'] : $hero_sub_tag_statement;
    $project_thumbnail = empty($thumbnailImage) ? $website_data['hero_image'] : $thumbnailImage;
    $query = "UPDATE website_data SET hero_tag = ?,hero_sub_tag = ?,hero_image = ?, affected = ? LIMIT 1";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ssss", $hero_tag,$hero_sub_tag_statement,$hero_image, $user);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

$dbconn->close();
?>