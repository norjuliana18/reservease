<?php
include("config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- Navbar Section Starts Here -->
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="#" title="Logo">
             <img src="images/group_logo.png" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>

        <div class="menu text-right">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
				<li>
                    <a href="user_profile.php">Profile</a>
                </li>
                <li>
                    <a href="restaurant.php">Restaurants</a>
                </li>
                <li>
                    <a href="review.php">Reviews</a>
                </li>
                <li>
                    <a href="reservations.php">Reservation</a>
                </li>
                <a href="logout.php"><button class="btnLogout-popup">Logout</button></a>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Navbar Section Ends Here -->

    <?php
    $id = $full_name = $contact = $email = $reservation_date = $reservation_time = "";

    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $sql = "SELECT * FROM reservation1 WHERE reservation_id =" . $_GET["id"];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["reservation_id"];
            $full_name = $row["full_name"];
            $contact = $row["contact"];
            $email = $row["email"];
            $reservation_date = $row["reservation_date"];
            $reservation_time = $row["reservation_time"];
        }
    }
    mysqli_close($conn);
    ?>

    <div style="padding:0 10px;" id="challengeDiv">
        <h3 align="center">Edit Reservation</h3>
        

        <form method="POST" action="reservations_edit_action.php" id="myForm" enctype="multipart/form-data" class="reservation-form">
            <input type="hidden" name="reservation_id" value="<?php echo $id; ?>">
            <table border="1" id="myTable">
                <fieldset>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" class="input-responsive" required value="<?php echo $full_name; ?>">

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" class="input-responsive" required value="<?php echo $contact; ?>">

                    <div class="order-label">Email</div>
                    <input type="email" name="email" class="input-responsive" required value="<?php echo $email; ?>">

                    <div class="order-label">Reservation Date</div>
                    <input type="date" name="reservation_date" class="input-responsive" required value="<?php echo $reservation_date; ?>">

                    <div class="order-label">Reservation Time</div>
                    <input type="time" name="reservation_time" class="input-responsive" required value="<?php echo $reservation_time; ?>">

                    <input type="submit" name="submit" value="Update Reservation" class="btn btn-primary">
                </fieldset>
            </table>
        </form>
    </div>

    <script>
        // Responsive menu and form functions (as provided)
    </script>
</body>

</html>

  