<?php
include('config.php');

// This action is called when the Delete link is clicked
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    $sql = "DELETE FROM reservation1 WHERE reservation_id=" . $id;

    if (mysqli_query($conn, $sql)) {
        echo "Reservation deleted successfully!<br>";
        echo '<a href="reservations.php">Back</a>';
    } else {
        echo "Error deleting reservation: " . mysqli_error($conn) . "<br>";
        echo '<a href="reservations.php">Back</a>';
    }
}

mysqli_close($conn);
?>
