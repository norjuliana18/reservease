<?php
include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Initialize variables
    $full_name = $contact = $email = $reservation_date = $reservation_time = $num_people = $selected_restaurants = [];

    // Get form data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $reservation_date = mysqli_real_escape_string($conn, $_POST['reservation_date']);
    $reservation_time = mysqli_real_escape_string($conn, $_POST['reservation_time']);
    $num_people = mysqli_real_escape_string($conn, $_POST['num_people']);
    $selected_restaurants = isset($_POST['selected_restaurants']) ? $_POST['selected_restaurants'] : [];

    // Insert data into reservations table for each selected restaurant
    foreach ($selected_restaurants as $restaurant_id) {
        $sql = "INSERT INTO reservation1 (full_name, contact, email, reservation_date, reservation_time, num_people, restaurant_id)
                VALUES ('$full_name', '$contact', '$email', '$reservation_date', '$reservation_time', '$num_people', '$restaurant_id')";

        if (mysqli_query($conn, $sql)) {
            echo '<p class="success">Reservation confirmed successfully for Restaurant ID: ' . $restaurant_id . '</p>';
			echo '<a href="reservations.php">Back to Reservation</a>';
        } else {
            echo '<p class="error">Error: ' . mysqli_error($conn) . '</p>';
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
