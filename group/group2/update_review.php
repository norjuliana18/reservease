<?php
// Include the database configuration file
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $review_id = mysqli_real_escape_string($conn, $_POST['review_id']);
    $restaurant_id = mysqli_real_escape_string($conn, $_POST['restaurant']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Handle image upload
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the uploaded file is a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Update review data with image
                $update_sql = "UPDATE reviews SET restaurant_id = '$restaurant_id', rating = $rating, content = '$content', review_image = '$target_file' WHERE review_id = $review_id";
                $message = "Review successfully updated with image.";
            } else {
                $message = "Error uploading file.";
            }
        } else {
            $message = "File is not a valid image.";
        }
    } else {
        // Update review data without image
        $update_sql = "UPDATE reviews SET restaurant_id = '$restaurant_id', rating = $rating, content = '$content' WHERE review_id = $review_id";
        $message = "Review successfully updated.";
    }

    // Execute the update query
    if (isset($update_sql) && mysqli_query($conn, $update_sql)) {
        // Success
        echo "<script>alert('$message'); window.location.href='review.php';</script>";
    } else {
        // Error
        echo "<script>alert('Error updating review: " . mysqli_error($conn) . "'); window.location.href='review.php';</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
