<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make the website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link your CSS file -->
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

    <!-- fOOD SEARCH Section Starts Here -->
   <!-- <section class="food-search text-center">
        <div class="container">
            <form action="restaurant.php" method="POST">
                <input type="search" name="search" placeholder="Search for Restaurants.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!-- fOOD SEARCH Section Ends Here -->
	
	<?php
// Include the database connection file
include 'config.php';

// Check if search term is provided in the URL
if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM restaurant WHERE name LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . $query . "<br>" . mysqli_error($conn));
    }

    // Display search results
    echo "<div class='container'>";
    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='food-menu-box'>";
            echo "<div class='food-menu-img'><img src='{$row['restaurant_image']}' alt='{$row['name']}' class='img-responsive img-curve'></div>";
            echo "<div class='food-menu-desc'>";
            echo "<h4>{$row['name']}</h4>";
            echo "<p class='food-price'>{$row['address']}</p>";
            echo "<p class='food-detail'>{$row['description']}</p>";
            echo "<a href='restaurant_details.php?restaurant_id={$row['restaurant_id']}' class='btn btn-primary'>View Details</a>";
            echo "</div></div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
    echo "</div>";

    // Close the search results section
    echo "<hr>";

    // Close the database connection and stop further execution
    mysqli_close($conn);
    exit();
}
?>

    <!-- fOOD MENU Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">List of Restaurants</h2>

            <?php
            // Include the database configuration file
            include('config.php');

            // Assuming you have a database connection and a query to retrieve restaurant data ($result) before this point
            $query = "SELECT * FROM restaurant";
            $result = mysqli_query($conn, $query);

            // Check if $result is not null before using it
            if ($result !== null && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php echo $row['restaurant_image']; ?>" alt="<?php echo $row['name']; ?>" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $row['name']; ?></h4>
                            <p class="food-price"><?php echo $row['address']; ?></p>
                            <p class="food-detail"><?php echo $row['description']; ?></p>
                            <br>

                            <!-- Customize the link based on your application structure -->
                            <a href="restaurant_details.php?restaurant_id=<?php echo $row['restaurant_id']; ?>" class="btn btn-primary">View Details</a>
							
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No restaurants found.";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
	
        <?php
        // Display "Add Restaurant" link and form for admin users
        if (isset($_SESSION['userRoles']) && $_SESSION['userRoles'] === 1) {
        ?>
        <a href="add_restaurant.php">Add Restaurant</a>
        <form action="add_restaurant.php" method="POST" enctype="multipart/form-data">	
		<form action="add_restaurant.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" required>

        <label for="restaurant_image">Restaurant Image:</label>
        <input type="file" name="restaurant_image" accept="image/*" required>

        <input type="submit" name="submit" value="Add Restaurant" class="btn btn-primary">
    </form>
<?php
}
?>

        </div>
    </section>
    <!-- fOOD MENU Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>
