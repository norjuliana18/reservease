<?php
include('config.php');

// Initialize variables
$id = $full_name = $contact = $email = $reservation_date = $reservation_time = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["reservation_id"];
    $full_name = trim($_POST["full_name"]);
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $reservation_date = $_POST["reservation_date"];
    $reservation_time = $_POST["reservation_time"];

    $sql = "UPDATE reservation1 SET full_name = '$full_name', contact = '$contact', email = '$email',  reservation_date = '$reservation_date', 
                reservation_time = '$reservation_time' WHERE reservation_id = '$id'";

    $status = update_DBTable($conn, $sql);

    if ($status) {
        echo "Form data updated successfully!<br>";
        echo '<a href="reservations.php">Back</a>';
    } else {
        echo '<a href="reservations.php">Back</a>';
    }
}

mysqli_close($conn);

function update_DBTable($conn, $sql)
{
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
?>
