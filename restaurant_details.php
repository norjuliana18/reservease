<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($restaurant['name']) ? $restaurant['name'] . ' Details' : 'Restaurant Details'; ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
     
//<!-- fOOD sEARCH Section Starts Here -->
// <!--<?php include 'restaurant-search.php'; ?>
    <section class="food-search text-center">
        <div class="container">
            
            <form action="restaurant.php" method="POST">
                <input type="search" name="search" placeholder="Search for Restaurants.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
 
<?php
// Include the database connection file
include 'config.php';

// Check if restaurant_id is provided in the URL
if (isset($_GET['restaurant_id'])) {
    $restaurant_id = $_GET['restaurant_id'];

    // Query to fetch details for the specific restaurant
    $query = "SELECT * FROM restaurant WHERE restaurant_id = $restaurant_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the restaurant details
        $restaurant = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Restaurant ID not provided in the URL.";
}
?>

<!-- Restaurant Details Section Starts Here -->
<section class="restaurant-details">
    <div class="container">
        <?php if (isset($restaurant) && !empty($restaurant)): ?>
            <div class="restaurant-details-img">
                <img src="<?php echo $restaurant['restaurant_image']; ?>" alt="<?php echo $restaurant['name']; ?>" class="img-responsive img-curve" style='width: 800px; height: 400px;'>
            </div>

            <div class="restaurant-details-desc">
                <p>&nbsp</p>
                <h2><?php echo $restaurant['name']; ?></h2>
                <p><?php echo $restaurant['address']; ?></p>
                <p><?php echo $restaurant['description']; ?></p>
                <p></p>

                <!-- Reservation link -->
                <p><a href="order.php?restaurant_id=<?php echo $restaurant['restaurant_id']; ?>" class="btn btn-primary">Book Now</a></p>
            </div>

        <?php else: ?>
            <p>No details available for the specified restaurant ID.</p>
        <?php endif; ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Restaurant Details Section Ends Here -->

<?php
// Query to fetch reviews for the specific restaurant
$reviewsQuery = "SELECT * FROM reviews WHERE restaurant_id = $restaurant_id";
$reviewsResult = mysqli_query($conn, $reviewsQuery);

// Check if there are reviews for the restaurant
if ($reviewsResult && mysqli_num_rows($reviewsResult) > 0) {
    ?>
    <!-- Reviews Display Section Starts Here -->
    <section class="reviews-display">
        <div class="container">
            <h2 class="text-center">Reviews for <?php echo $restaurant['name']; ?></h2>

            <?php
            // Display each review
            while ($review = mysqli_fetch_assoc($reviewsResult)) {
                echo "<div class='review-post'>";
                // Display rating stars
                echo "<p>Rating: ";
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $review["rating"]) {
                        echo "<i class='fa fa-star'></i>";
                    } else {
                        echo "<i class='fa fa-star-o'></i>";
                    }
                }
                echo "</p>";
                echo "<p>" . '"' . $review["content"] . '"' . "</p>";
                // Display review image if available
                if (!empty($review["review_image"])) {
                    echo "<p><img src='" . $review["review_image"] . "' alt='Review Image' style='width: 200px; height: 150px;'></p>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </section>
    <!-- Reviews Display Section Ends Here -->
<?php
} else {
    // No reviews available, display a pop-up message
    echo "<script>alert('No reviews available for " . $restaurant['name'] . ".');</script>";
}

// Close the database connection (this is optional since PHP will automatically close it at the end of the script)
mysqli_close($conn);
?>

<!-- footer Section Starts Here -->
<section class="footer">
    <div class="container text-center">
        <p>All rights reserved. Designed By <a href="#">GROUP 2</a></p>
    </div>
</section>
<!-- footer Section Ends Here -->
</body>
</html>


</body>
</html>
