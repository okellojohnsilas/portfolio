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
    $hero_sub_tag_word = mysqli_real_escape_string($dbconn, $_POST['hero_sub_tag_word']);
    // Append new sub tag to the existing hero_sub_tag
    $website_data = get_item_data($dbconn, "website_data", "");
    $existing_sub_tags = $website_data['hero_sub_tag_words'];
    // Normalize and split existing sub-tags
    $sub_tags_array = array_map('trim', explode(',', $existing_sub_tags));

    // Check if the sub-tag already exists (case-insensitive)
    if (in_array(strtolower($hero_sub_tag_word), array_map('strtolower', $sub_tags_array))) {
        $_SESSION['error'] = "Sub Tag Word Already Exists";
        header("Location: $redirect");
        exit();
    }

    // Append new sub-tag
    $hero_sub_tag_word = trim($hero_sub_tag_word);
    $hero_sub_tag_word = !empty($existing_sub_tags)
        ? $existing_sub_tags . ', ' . $hero_sub_tag_word
        : $hero_sub_tag_word;

    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE website_data SET hero_sub_tag_words=? LIMIT 1";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "s", $hero_sub_tag_word);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect, $success_message = "Sub Tag Word Added", $error_message = "Failed to send your message. Please try again later.");
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
    $user = empty($user) ? $website_data['affected'] : $user;
    $hero_tag = empty($hero_tag) ? $website_data['hero_tag'] : $hero_tag;
    $hero_sub_tag_statement = empty($hero_sub_tag_statement) ? $website_data['hero_sub_tag_statement'] : $hero_sub_tag_statement;
    // $project_thumbnail = empty($thumbnailImage) ? $website_data['project_thumbnail'] : $thumbnailImage;
    $query = "UPDATE website_data SET hero_sub_tag = ?, affected = ?";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ss", $project_category, $user);
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