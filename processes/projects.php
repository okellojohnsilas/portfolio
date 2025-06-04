<?php
// Include process config file
include 'process_config.php';

// -------------------------- PROJECT CATEGORIES SECTION ---------------------------------------
// Add project category
if (isset($_POST['add_project_category'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/categories';
    // Perform a security token check
    token_check($_POST['add_project_category_token'], $_SESSION['add_project_category_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $project_category = mysqli_real_escape_string($dbconn, $_POST['project_category']);
    if (check_if_record_exists($dbconn, "select * from project_categories where category = '$project_category' and deleted = 0")) {
        $_SESSION["error"] = "Category already exists.";
        header("Location: $redirect");
        exit();
    }
    // Prepare the SQL insert query using a prepared statement
    $query = "INSERT INTO project_categories (category, affected) VALUES (?, ?)";
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

// Edit project category
if (isset($_POST['edit_project_category'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/categories';
    // Perform a security token check
    token_check($_POST['edit_project_category_token'], $_SESSION['edit_project_category_token'], $redirect);
    // Sanitize user input
    $id = strtolower(mysqli_real_escape_string($dbconn, $_POST['category']));
    $project_category = mysqli_real_escape_string($dbconn, $_POST['project_category']);
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE project_categories set category=?, affected=? where id=?";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "sss", $project_category, $user, $id);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Deactivate project category
if (isset($_GET["deactivate_project_category"])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/categories';
    // Variable declaration
    $id = $_GET["deactivate_project_category"];
    $status = 0;
    // Prepare the SQL insert query using a prepared statement	
    $query = "update project_categories set status=? where id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Activate project category
if (isset($_GET["activate_project_category"])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/categories';
    // Variable declaration
    $id = $_GET["activate_project_category"];
    $status = 1;
    // Prepare the SQL insert query using a prepared statement	
    $query = "update project_categories set status=? where id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// -------------------------- PROJECTS SECTION ---------------------------------------
// Add project
if (isset($_POST['add_project'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/project_list';
    // Perform a security token check
    token_check($_POST['add_project_token'], $_SESSION['add_project_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $project_name = mysqli_real_escape_string($dbconn, $_POST['project_name']);
    $project_link = mysqli_real_escape_string($dbconn, $_POST['project_link']);
    $project_category = mysqli_real_escape_string($dbconn, $_POST['project_category']);
    $project_description = mysqli_real_escape_string($dbconn, $_POST['project_description']);
    // Handle Project Thumbnail Upload
    $thumbnail = $_FILES['project_thumbnail']['name'];
    $thumbnail_type = $_FILES['project_thumbnail']['type'];
    $thumbnail_tmp_name = $_FILES['project_thumbnail']['tmp_name'];
    $thumbnailImage = '';
    if (!empty($thumbnail)) {
        if (!file_exists('../uploads/img/projects/thumbnails/')) {
            mkdir('../uploads/img/projects/thumbnails/', 0777, true);
        }
        $thumbnail_path = '../uploads/img/projects/thumbnails/';
        $thumbnailImage = upload_file($dbconn, $thumbnail, $thumbnail_type, $thumbnail_tmp_name, $redirect, $thumbnail_path);
    }
    // Handle Project Screenshots Upload (multiple files)
    $screenshots = [];
    if (!empty($_FILES['project_screenshots']['name'][0])) {
        if (!file_exists('../uploads/img/projects/screenshots/')) {
            mkdir('../uploads/img/projects/screenshots/', 0777, true);
        }
        $screenshots_path = '../uploads/img/projects/screenshots/';
        foreach ($_FILES['project_screenshots']['name'] as $key => $screenshot_name) {
            $screenshot_type = $_FILES['project_screenshots']['type'][$key];
            $screenshot_tmp_name = $_FILES['project_screenshots']['tmp_name'][$key];
            $uploaded_screenshot = upload_file($dbconn, $screenshot_name, $screenshot_type, $screenshot_tmp_name, $redirect, $screenshots_path);
            if ($uploaded_screenshot) {
                $screenshots[] = $uploaded_screenshot;
            }
        }
    }
    // Handle Project File Upload (single file)
    $project_file = '';
    if (!empty($_FILES['project_file']['name'])) {
        if (!file_exists('../uploads/files/projects/')) {
            mkdir('../uploads/files/projects/', 0777, true);
        }
        $file_name = $_FILES['project_file']['name'];
        $file_type = $_FILES['project_file']['type'];
        $file_tmp_name = $_FILES['project_file']['tmp_name'];
        $file_path = '../uploads/files/projects/';
        $project_file = upload_file($dbconn, $file_name, $file_type, $file_tmp_name, $redirect, $file_path);
    }
    // Store screenshots as a comma-separated list
    $project_screenshots = implode(',', $screenshots);
    // Prepare the SQL insert query using a prepared statement
    $query = "INSERT INTO projects (project_name, category, project_description, project_thumbnail, project_images, project_link, project_file, affected) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ssssssss", $project_name, $project_category, $project_description, $thumbnailImage, $project_screenshots, $project_link, $project_file, $user);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Edit project
if (isset($_POST['edit_project'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/project_list';
    // Perform a security token check
    token_check($_POST['edit_project_token'], $_SESSION['edit_project_token'], $redirect);
    // Sanitize user input
    $id = strtolower(mysqli_real_escape_string($dbconn, $_POST['project']));
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $project_name = mysqli_real_escape_string($dbconn, $_POST['project_name']);
    $project_link = mysqli_real_escape_string($dbconn, $_POST['project_link']);
    $project_category = mysqli_real_escape_string($dbconn, $_POST['project_category']);
    $project_description = strtolower(mysqli_real_escape_string($dbconn, $_POST['project_description']));
    // Handle Project Thumbnail Upload
    $thumbnail = $_FILES['project_thumbnail']['name'];
    $thumbnail_type = $_FILES['project_thumbnail']['type'];
    $thumbnail_tmp_name = $_FILES['project_thumbnail']['tmp_name'];
    $thumbnailImage = '';
    if (!empty($thumbnail)) {
        if (!file_exists('../uploads/img/projects/thumbnails/')) {
            mkdir('../uploads/img/projects/thumbnails/', 0777, true);
        }
        $thumbnail_path = '../uploads/img/projects/thumbnails/';
        $thumbnailImage = upload_file($dbconn, $thumbnail, $thumbnail_type, $thumbnail_tmp_name, $redirect, $thumbnail_path);
    }
    // Get project details or use default values
    $project_data = get_item_data($dbconn, "projects", " where id = '$id'");
    $user = empty($user) ? $project_data['affected'] : $user;
    $project_name = empty($project_name) ? $project_data['project_name'] : $project_name;
    $project_link = empty($project_link) ? $project_data['project_link'] : $project_link;
    $project_category = empty($project_category) ? $project_data['project_category'] : $project_category;
    $project_thumbnail = empty($thumbnailImage) ? $project_data['project_thumbnail'] : $thumbnailImage;
    $project_description = empty($project_description) ? $project_data['project_description'] : $project_description;
    print($project_thumbnail);
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE projects SET project_name=?, category=?, project_description=?, project_thumbnail=?, project_link=?, affected=? WHERE id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "sssssss", $project_name, $project_category, $project_description, $project_thumbnail, $project_link, $user, $id);
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Add project screenshots
if (isset($_POST['add_project_screenshots'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/project_list';
    // Perform a security token check
    token_check($_POST['add_project_screenshots_token'], $_SESSION['add_project_screenshots_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $id = mysqli_real_escape_string($dbconn, $_POST['project']);
    // Handle Project Screenshots Upload (multiple files)
    $screenshots = [];
    if (!empty($_FILES['project_screenshots']['name'][0])) {
        if (!file_exists('../uploads/img/projects/screenshots/')) {
            mkdir('../uploads/img/projects/screenshots/', 0777, true);
        }
        $screenshots_path = '../uploads/img/projects/screenshots/';
        foreach ($_FILES['project_screenshots']['name'] as $key => $screenshot_name) {
            $screenshot_type = $_FILES['project_screenshots']['type'][$key];
            $screenshot_tmp_name = $_FILES['project_screenshots']['tmp_name'][$key];
            $uploaded_screenshot = upload_file($dbconn, $screenshot_name, $screenshot_type, $screenshot_tmp_name, $redirect, $screenshots_path);
            if ($uploaded_screenshot) {
                $screenshots[] = $uploaded_screenshot;
            }
        }
    }
    // Store screenshots as a comma-separated list
    $project_screenshots = implode(',', $screenshots);
    // Prepare the SQL insert query using a prepared statement
    $query = "UPDATE projects set project_images=?,affected=? where id=?";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "sss", $project_screenshots, $user, $id);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Change project file
if (isset($_POST['change_project_file'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/project_list';
    // Perform a security token check
    token_check($_POST['change_project_file_token'], $_SESSION['change_project_file_token'], $redirect);
    // Sanitize user input
    $id = mysqli_real_escape_string($dbconn, $_POST['project']);
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    // Handle Project File Upload (single file)
    $project_file = '';
    if (!empty($_FILES['project_file']['name'])) {
        if (!file_exists('../uploads/files/projects/')) {
            mkdir('../uploads/files/projects/', 0777, true);
        }
        $file_name = $_FILES['project_file']['name'];
        $file_type = $_FILES['project_file']['type'];
        $file_tmp_name = $_FILES['project_file']['tmp_name'];
        $file_path = '../uploads/files/projects/';
        $project_file = upload_file($dbconn, $file_name, $file_type, $file_tmp_name, $redirect, $file_path);
    }
    // Prepare the SQL insert query using a prepared statement
    $query = "update projects set project_file=?,affected=? where id=?";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "sss", $project_file, $user, $id);
        // Execute prepared statement
        executePreparedStmt($dbconn, $stmt, $redirect);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// Delete media
if (isset($_GET['delete_media'])) {
    // Variable declaration
    $media_data = $_GET["delete_media"];
    // Get the data
    $data = decode_array($media_data);
    $project_id = $data[0];  
    $image = $data[1]; 
    // Define the redirection URL
    $redirect = base_url().'admin/projects/manage_media?item='.$project_id;
    // Project media
    $project_media = get_item_name_by_id($dbconn,"projects","project_images","id",$project_id);
    $media_array = explode(",", $project_media);
    if (($key = array_search($image, $media_array)) !== false) {
        unset($media_array[$key]);
    }
    $new_media = implode(",", $media_array);
    // Prepare the SQL insert query using a prepared statement	
    $query = "update projects set project_images=? where id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss",$new_media,$project_id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Deactivate project
if (isset($_GET["deactivate_project"])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/project_list';
    // Variable declaration
    $id = $_GET["deactivate_project"];
    $status = 0;
    // Prepare the SQL insert query using a prepared statement	
    $query = "update projects set status=? where id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);
}

// Activate project
if (isset($_GET["activate_project"])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/project_list';
    // Variable declaration
    $id = $_GET["activate_project"];
    $status = 1;
    // Prepare the SQL insert query using a prepared statement	
    $query = "update projects set status=? where id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);

}

// Delete project
if (isset($_GET['delete_project'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/project_list';
    // Variable declaration
    $id = $_GET["delete_project"];
    $status = 0;
    $deleted = 1;
    // Prepare the SQL insert query using a prepared statement	
    $query = "update projects set status=?,deleted=? where id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "sss", $status, $deleted, $id);
    // Execute prepared statement
    executePreparedStmt($dbconn, $stmt, $redirect);

}
$dbconn->close();
?>