<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $restaurant = mysqli_real_escape_string($conn, $_POST['restaurant']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Check if an image file is uploaded
    if (!empty($_FILES["image"]["name"])) {
        // Handle image upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the uploaded file is a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Insert review data into the database with image
                $sql = "INSERT INTO reviews (restaurant_id, rating, content, review_image, created_at)
                        VALUES ('$restaurant', $rating, '$content', '$target_file', NOW())";

                if (mysqli_query($conn, $sql)) {
                    echo "Review submitted successfully. <br>";
                    echo "<a href='review.php'>Back to Reviews</a>"; // Back button
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File is not a valid image.";
        }
    } else {
        // Insert review data into the database without image
        $sql = "INSERT INTO reviews (restaurant_id, rating, content, created_at)
                VALUES ('$restaurant', $rating, '$content', NOW())";

        if (mysqli_query($conn, $sql)) {
            echo "Review submitted successfully. <br>";
            echo "<a href='review.php'>Back to Reviews</a>"; // Back button
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
