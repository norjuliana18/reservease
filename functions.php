<?php
// functions.php

// Check if the user is an admin
function isAdmin() {
    return isset($_SESSION['userRoles']) && $_SESSION['userRoles'] === 1;
}

// Sanitize user input to prevent SQL injection
function sanitize_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Handle file upload
function handleFileUpload($file) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        return $uploadFile;
    }
    return false;
}
?>
