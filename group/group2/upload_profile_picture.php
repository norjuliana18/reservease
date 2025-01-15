<?php
session_start();
include("config.php");

// Check if the user is logged in
if (!isset($_SESSION["UID"])) {
    header("Location: userP.php");
    exit();
}

$userID = $_SESSION["UID"];

// Define the directory where profile pictures will be stored
$upload_dir = "images/profileP/";

// Create the directory if it doesn't exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

if (isset($_POST["upload"])) {
    // Check if a file was selected
    if (!empty($_FILES["profile_picture"]["name"])) {
        $file_name = $_FILES["profile_picture"]["name"];
        $temp_name = $_FILES["profile_picture"]["tmp_name"];
        $file_type = $_FILES["profile_picture"]["type"];
        $file_size = $_FILES["profile_picture"]["size"];
        $file_error = $_FILES["profile_picture"]["error"];

        // Check file type (allow only certain extensions)
        $allowed_extensions = array("jpg", "jpeg", "png");
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            // Generate a unique filename for the uploaded picture
            $unique_filename = $userID . "_" . time() . "." . $file_extension;
            $destination = $upload_dir . $unique_filename;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($temp_name, $destination)) {
                // Update the user's profile picture in the database
                $update_sql = "UPDATE user SET profile_picture = '$unique_filename' WHERE userID = '$userID'";
                mysqli_query($conn, $update_sql);

                echo "Profile picture uploaded successfully!";
                echo '<a href="userP.php" class="btn btn-primary">Go Back to User Profile</a>';
            } else {
                echo "Error uploading profile picture.";
            }
        } else {
            echo "Invalid file format. Allowed formats: JPG, JPEG, PNG.";
        }
    } else {
        echo "Please select a file to upload.";
    }
}
?>
