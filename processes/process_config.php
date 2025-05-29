<?php
    // Include config files
    require_once('../config/config.php');
    include '../tools/functions.php';

    // Function to upload and optimize an image using Intervention Image
    function upload_file($db_connection, $image, $image_type, $image_tmp_name, $redirect, $path)
    {
        // Extract the file extension
        $file_extension = pathinfo($image, PATHINFO_EXTENSION);
        // Define the allowed image extensions
        $allowed_extensions = ["png", "jpg", "jpeg", "jfif"];
        // Check if the file type is valid
        if (!in_array(strtolower($file_extension), $allowed_extensions) && !empty($image_type)) {
            $_SESSION["error"] = "The file type that has been uploaded is not valid";
            header("Location: $redirect");
            exit();
        }
        // Generate a unique filename
        $new_itemImage_name = md5(time()) . '_' . rand() . '.' . $file_extension;
        $target = $path . $new_itemImage_name;
        // Move the uploaded image
        if (move_uploaded_file($image_tmp_name, $target)) {
            return $new_itemImage_name;
        } else {
            $_SESSION["error"] = "Failed to upload the file because: " . $db_connection->error;
            header("Location: $redirect");
            exit();
        }
    }
?>