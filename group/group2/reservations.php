<?php include("config.php"); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
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

    <h2 class="text-center">List of Reservation</h2>

<div style="padding:0 10px;">
	<table border=""class="reservation-table">
		<tr>
            <th width="10%">No</th>
            <th width="30%">Name</th>
			<th width="15%">Contact</th>
			<th width="15%">Email</th>
			<th width="15%">Reservation Date</th>
            <th width="15%">Reservation Time</th>
            <th width="15%">Restaurant</th>
			<th width="15%">&nbsp;</th>
		</tr>

        <?php 
    $sql = "SELECT r1.*, r.name AS restaurant_name
            FROM reservation1 r1
            JOIN restaurant r ON r1.restaurant_id = r.restaurant_id"; 
    $result = mysqli_query($conn, $sql); 

    if (mysqli_num_rows($result) > 0) { 
        // Output data of each row 
        $numrow = 1;                 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $numrow . "</td><td>" . $row["full_name"] . "</td><td>" . $row["contact"] . "</td><td>" . $row["email"] . "</td><td>" . $row["reservation_date"] . "</td><td>" . $row["reservation_time"] . "</td><td>" . $row["restaurant_name"] . "</td>" ;
            echo '<td><a href="reservations_edit.php?id=' . $row["reservation_id"] . '">Edit</a>&nbsp;|&nbsp;';
            echo '<a href="reservations_delete.php?id=' . $row["reservation_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a></td>';
            echo "</tr>" . "\n\t\t";
            $numrow++;
        }
    } else {                 
        echo '<tr><td colspan="8">0 results</td></tr>'; 
    }  

    mysqli_close($conn);
?>

</table>
</div>

<script>
//for responsive sandwich menu
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>
