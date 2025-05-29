<?php
// Include process config file
include 'process_config.php';

// -------------------------- PROJECT CATEGORIES SECTION ---------------------------------------
// Add project
if (isset($_POST['add_project_category'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/categories';
    // Perform a security token check
    token_check($_POST['add_project_category_token'], $_SESSION['add_project_category_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $project_category = mysqli_real_escape_string($dbconn, $_POST['project_category']);
    // Prepare the SQL insert query using a prepared statement
    $query = "INSERT INTO project_categories (category, affected) VALUES (?, ?)";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ss", $project_category,  $user);
        // Execute prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["success"] = "Project Category added";
            header("Location: $redirect");
            exit();
        } else {
            $_SESSION["error"] = "Failed!! " . mysqli_stmt_error($stmt);
            header("Location: $redirect");
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION["error"] = "Failed to prepare statement: " . mysqli_error($dbconn);
        header("Location: $redirect");
        exit();
    }
}

// -------------------------- PROJECTS SECTION ---------------------------------------
// Add project
if (isset($_POST['add_project'])) {
    // Define the redirection URL
    $redirect = base_url() . 'admin/projects/projects';
    // Perform a security token check
    token_check($_POST['add_project_token'], $_SESSION['add_project_token'], $redirect);
    // Sanitize user input
    $user = mysqli_real_escape_string($dbconn, $_POST['user']);
    $project_name = mysqli_real_escape_string($dbconn, $_POST['project_name']);
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
    $query = "INSERT INTO projects (project_name, project_category,project_description, project_thumbnail, project_images, affected) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($dbconn, $query);
    if ($stmt) {
        // Bind parameters and set their values
        mysqli_stmt_bind_param($stmt, "ssssss", $project_name, $project_description, $thumbnailImage, $project_screenshots, $user);
        // Execute prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["success"] = "Project added";
            header("Location: $redirect");
            exit();
        } else {
            $_SESSION["error"] = "Failed!! " . mysqli_stmt_error($stmt);
            header("Location: $redirect");
            exit();
        }
        mysqli_stmt_close($stmt);
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
    $name = mysqli_real_escape_string($dbconn, $_POST['name']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $telephone = mysqli_real_escape_string($dbconn, $_POST['telephone']);
    $website = mysqli_real_escape_string($dbconn, $_POST['website']);
    $address = mysqli_real_escape_string($dbconn, $_POST['address']);
    $description = mysqli_real_escape_string($dbconn, $_POST['description']);
    // Avatar data
    $logo = $_FILES['logo']['name'];
    $logo_type = $_FILES['logo']['type'];
    $logo_tmp_name = $_FILES['logo']['tmp_name'];
    // ============= If Image Exists ==========================    
    if (!empty($logo)) {
        // Check if the uploads folder exists
        if (!file_exists('../uploads/img/projects/')) {
            mkdir('../uploads/img/projects/', 0777, true);
        }
        $path = '../uploads/img/projects/';
        // Upload image
        $itemImage = upload_file($dbconn, $logo, $logo_type, $logo_tmp_name, $redirect, $path);
    }
    // Get project details or use default values
    $project_data = get_item_data($dbconn, "projects", " where id = '$id'");
    $name = empty($name) ? $project_data['name'] : $name;
    $email = empty($email) ? $project_data['email'] : $email;
    $telephone = empty($telephone) ? $project_data['telephone'] : $telephone;
    $website = empty($website) ? $project_data['website'] : $website;
    $address = empty($address) ? $project_data['address'] : $address;
    $itemImage = empty($itemImage) ? $project_data['logo'] : $itemImage;
    $description = empty($description) ? $project_data['description'] : $description;
    // Prepare the SQL insert query using a prepared statement
    $query = "update projects set name=?,phone=?,email=?,logo=?,website=?,description=?,address=?,affected=? where id=?";
    // Create a prepared statement
    $stmt = mysqli_prepare($dbconn, $query);
    // Bind parameters and set their values
    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $telephone, $email, $itemImage, $website, $description, $address, $user, $id);
    // Execute prepared statement
    executePreparedStmt($stmt, $redirect);
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
    executePreparedStmt($stmt, $redirect);
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
    executePreparedStmt($stmt, $redirect);
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
    executePreparedStmt($stmt, $redirect);
}

$dbconn->close();
?>