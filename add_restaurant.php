<?php
// add_restaurant.php
namespace Group2\Restaurant;

use Group2\Config\Database;

// Start the session
session_start();

// Check if the user is logged in and has the 'ADMIN' role (assuming role 1 is ADMIN)
if (!isset($_SESSION['userRoles']) || $_SESSION['userRoles'] !== 1) {
    // Redirect to login page if not an admin
    header('Location: login.php');
    exit();
}

// Include the database connection file
require_once 'path_to_your_database_connection_file.php'; // Update the path as necessary

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    // Handle image upload
    $uploadDir = 'uploads/';  // Create a folder named 'uploads' in your project directory
    $uploadFile = $uploadDir . basename($_FILES['restaurant_image']['name']);

    if (move_uploaded_file($_FILES['restaurant_image']['tmp_name'], $uploadFile)) {
        // Prepare and bind the query using prepared statements
        $query = "INSERT INTO restaurant (name, description, address, contact, created_at, updated_at, restaurant_image) 
                  VALUES (?, ?, ?, ?, NOW(), NOW(), ?)";

        // Prepare the statement
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Bind the parameters to the query
            mysqli_stmt_bind_param($stmt, 'sssss', $name, $description, $address, $contact, $uploadFile);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "Restaurant added successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
