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

<!-- fOOD sEARCH Section Starts Here -->
	<?php include 'restaurant-search.php'; ?>
    <section class="food-search text-center">
        <div class="container">
            
            <form action="restaurant.php" method="GET">
                <input type="search" name="search" placeholder="Search for Restaurants.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

	<!-- Dashboard Section Starts Here -->
<section class="dashboard">
    <div class="container">
        <h2 class="text-center">Welcome to Reservease!</h2>
        
        <!-- Company Introduction -->
        <div class="company-intro">
            <p>
                Welcome to Reservease, where we strive to provide you with an exceptional dining experience. 
                Explore a variety of cuisines and discover the finest restaurants in town. 
                Whether you're a food enthusiast or looking for a cozy place to dine, we've got something for everyone.
            </p>
        </div>

        <!-- Reservation Tutorial -->
        <div class="reservation-tutorial-container">
            <h3>How to Book a Reservation?</h3>
            <p>
                Booking a reservation is quick and easy! Follow these simple steps:
            </p>
            <ol>
                <li>Log in to your account or sign up if you're new.</li>
                <li>Explore our diverse range of restaurants and choose your preferred one.</li>
                <li>Click on the "Book Now" button and select the date and time for your reservation.</li>
                <li>Provide any additional details or preferences.</li>
                <li>Confirm your reservation, and you're all set!</li>
            </ol>
        </div>
		
		<?php include 'recommendation.php'; ?>
		
<!-- Recommended Restaurants Section -->
<?php
$recommended_restaurants = getRecommendedRestaurants($conn);

if (!empty($recommended_restaurants)) {
    echo "<div class='.recommended-restaurants-container '>";
    echo "<br><h2 class='text-center'>Reserve Here Again : </h2>";
    echo "<div class='recommended-restaurants'>";
    foreach ($recommended_restaurants as $restaurant_id) {
        // Fetch and display restaurant details (replace 'restaurant' with your actual table name)
        $restaurant_query = "SELECT * FROM restaurant WHERE restaurant_id = $restaurant_id";
        $restaurant_result = mysqli_query($conn, $restaurant_query);

        if ($restaurant_result && mysqli_num_rows($restaurant_result) > 0) {
            $restaurant = mysqli_fetch_assoc($restaurant_result);
            echo "<div class='recommended-restaurant'>";
            echo "<img src='{$restaurant['restaurant_image']}' alt='{$restaurant['name']}' class='img-responsive img-curve'>";
            echo "<h4>{$restaurant['name']}</h4>";
            echo "<p>{$restaurant['description']}</p><br>";
            echo "<a href='restaurant_details.php?restaurant_id={$restaurant['restaurant_id']}' class='btn btn-primary'>View Details</a>";
            echo "</div><br>";
        }
    }
    echo "</div>";
    echo "</div>";
}
?>
<!-- End of Recommended Restaurants Section -->


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Restaurants</h2>

            <a href="restaurant_details.php?restaurant_id=1">
            <div class="box-3 float-container">
                <img src="images/16bb0a3ab8ea98cfe8906135767f7bf4.jpeg" alt="Asian Cuisine" class="img-responsive img-curve">

                <h3 class="float-text text-white">Asian Cuisine</h3>
            </div>
            </a>

            <a href="restaurant_details.php?restaurant_id=2">
            <div class="box-3 float-container">
                <img src="images/lovepik-western-food-platter-picture_501212817.jpg" alt="Western Cuisine" class="img-responsive img-curve">

                <h3 class="float-text text-white">Western Cuisine</h3>
            </div>
            </a>

            <a href="restaurant_details.php?restaurant_id=3">
            <div class="box-3 float-container">
                <img src="images/Falafel-King-4-1024x1024.jpg" alt="Arabic Cuisine" class="img-responsive img-curve">

                <h3 class="float-text text-white">Arabic Cuisine</h3>
            </div>
            </a>
			
			<a href="restaurant_details.php?restaurant_id=4">
            <div class="box-3 float-container">
                <img src="images/68A5700-1024x683.jpg" alt="Japanese Cuisine" class="img-responsive img-curve">

                <h3 class="float-text text-white">Japanese Cuisine</h3>
            </div>
            </a>

			<a href="restaurant_details.php?restaurant_id=5">
            <div class="box-3 float-container">
                <img src="images/4-Taureaux-Spread.jpg" alt="French Cuisine" class="img-responsive img-curve">

                <h3 class="float-text text-white">French Cuisine</h3>
            </div>
            </a>
			
			<a href="restaurant_details.php?restaurant_id=6">
            <div class="box-3 float-container">
                <img src="images/the-best-top-10-indian-dishes.jpg" alt="Indian Cuisine" class="img-responsive img-curve">

                <h3 class="float-text text-white">Indian Cuisine</h3>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
        </div>
    </section> 
	<p class="text-center">
            <a href="restaurant.php">See All Restaurants</a>
        </p>
    <!-- Categories Section Ends Here -->

    
    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">GROUP 2</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>