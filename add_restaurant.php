<?php
// add_restaurant.php

// Include necessary files
include_once 'config.php';
include_once 'functions.php'; // New file to handle common operations like database and file upload

// Start the session
session_start();

// Check if the user is logged in and has the 'ADMIN' role
if (!isAdmin()) {  // isAdmin() checks if the user is logged in and has the 'ADMIN' role
    header('Location: login.php');
    exit();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and sanitize it
    $name = sanitize_input($_POST['name']);
    $description = sanitize_input($_POST['description']);
    $address = sanitize_input($_POST['address']);
    $contact = sanitize_input($_POST['contact']);

    // Handle image upload
    $uploadFile = handleFileUpload($_FILES['restaurant_image']);

    if ($uploadFile) {
        // Perform the database insert using a function
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
