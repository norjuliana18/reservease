<?php include 'config.php'; ?>  <!-- Include the database connection -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/group_logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li><a href="restaurant.php">Restaurants</a></li>
                    <li><a href="reservations.php">Reservation</a></li>
                    <li><a href="admindash.php">Admin Dashboard</a></li>
                    <li><a href="userP.php">User Profile</a></li>
                    <a href="logout.php"><button class="btnLogout-popup">Logout</button></a>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    
    <div style="padding:0 10px;">
        <?php
        $countReservations = "SELECT COUNT(*) AS totalReservations FROM reservation1";
        $countResult3 = mysqli_query($conn, $countReservations);
        $countUser = "SELECT COUNT(*) AS totalCount FROM user";
        $countResult2 = mysqli_query($conn, $countUser);

        if ($countResult3) {
            // Fetch the total number of reservations
            $row3 = mysqli_fetch_assoc($countResult3);
            if (isset($row3['totalReservations'])) {
                $totalReservations = $row3['totalReservations'];
            } else {
                echo "Total reservations data not found.";
            }
        } else {
            echo "Error counting reservations: " . mysqli_error($conn);
        }

        if ($countResult2) {
            // Fetch the total number of users
            $row2 = mysqli_fetch_assoc($countResult2);
            if (isset($row2['totalCount'])) {
                $totalUser = $row2['totalCount'];
            } else {
                echo "Total users data not found.";
            }
        } else {
            echo "Error counting users: " . mysqli_error($conn);
        }

        mysqli_close($conn);  // Close the database connection
        ?>
        <div class="center-table">
            <table id="projectable">
                <tr><th>Total Reservations</th></tr>
                <tr><td><?php echo $totalReservations; ?></td></tr>
            </table>

            <table id="projectable">
                <tr><th>Total Users</th></tr>
                <tr><td><?php echo $totalUser; ?></td></tr>
            </table>
            <a href="userMgmt.php"><button>Expand User</button></a>
        </div>
    </div>

    <section class="styled-box">
        <h2><a href="resChart.php" style="color: white; text-decoration: none;">Reservation Trend</a></h2>
    </section>
</body>
</html>
