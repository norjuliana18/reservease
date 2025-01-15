<?php
// Include the database connection configuration
include('config.php');

// Check if the review_id is provided in the URL
if (isset($_GET['review_id'])) {
    $reviewId = $_GET['review_id'];

    // Delete the review based on the review_id
    $deleteQuery = "DELETE FROM reviews WHERE review_id = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $reviewId);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            echo "Review deleted successfully!";
			echo " <br><a href='review.php'>Back to Reviews</a>";
        } else {
            echo "Error deleting review: " . mysqli_error($conn);
			echo " <br><a href='review.php'>Back to Reviews</a>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
		echo " <br><a href='review.php'>Back to Reviews</a>";
    }
} else {
    echo "Review ID not provided!";
	echo " <br><a href='review.php'>Back to Reviews</a>";
}

// Close the database connection
mysqli_close($conn);
?>
