<?php
namespace Group2\Restaurant;

use Group2\Config\Database;

include 'config.php';  // Include the database connection

// Check if the user is logged in and has the 'ADMIN' role
session_start();
if (isset($_SESSION['userRoles']) && $_SESSION['userRoles'] === 1) {
    // Redirect to a login page or show an error message
    header('Location: login.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // Handle image upload
    $uploadDir = 'uploads/';  // Create a folder named 'uploads' in your project directory
    $uploadFile = $uploadDir . basename($_FILES['restaurant_image']['name']);

    if (move_uploaded_file($_FILES['restaurant_image']['tmp_name'], $uploadFile)) {
        // Perform the database insert
        $query = "INSERT INTO restaurant (name, description, address, contact, created_at, updated_at, restaurant_image) 
                  VALUES ('$name', '$description', '$address', '$contact', NOW(), NOW(), '$uploadFile')";

        if (mysqli_query($conn, $query)) {
            echo "Restaurant added successfully.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
