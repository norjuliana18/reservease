<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure user ID is available in the session
    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
        $userId = $_SESSION['userID']; // Replace with your actual session variable

        // You can add any additional fields you want to update here
        $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';

        // Update user profile in the database
        // Modify the query accordingly based on the fields you want to update
        $updateProfileQuery = "UPDATE user SET username = '$username' WHERE userID = $userId";
        $updateProfileResult = mysqli_query($conn, $updateProfileQuery);

        // Check if the update was successful
        if ($updateProfileResult) {
            echo "Profile updated successfully!";
			
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
    } else {
        echo "User ID not found in session.";
    }
	
    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>

