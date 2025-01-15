<?php include("config.php"); ?>

<?php
// order.php

// Retrieve the restaurant_id from the URL parameter
if (isset($_GET['restaurant_id'])) {
    $restaurant_id = $_GET['restaurant_id'];

    // Use $restaurant_id as needed in the reservation form
} else {
    echo "Restaurant ID not provided in the URL.";
    // You may want to redirect the user or handle the absence of restaurant_id differently.
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make the website responsive -->
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

    <!-- Reservation Form Starts Here -->
    <section class="food-search">
        <div class="container">
            <h2 class="text-center text-white">Fill this form to confirm your reservation.</h2>

            <form action="order_action.php" method="post" class="order">

                <?php
                // Fetch all data from the restaurant table
                $sql = "SELECT * FROM restaurant";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    // Display the restaurant details
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<fieldset>';
                        echo '<legend>Restaurant Details</legend>';
                        echo '<div class="food-menu-img">';

                        // Check if the restaurant image exists
                        $imagePath = $row['restaurant_image'];
                        if (file_exists($imagePath)) {
                            echo '<img src="' . $imagePath . '" alt="Restaurant Image" class="img-responsive img-curve">';
                        } else {
                            echo '<p>Image not available</p>';
                        }

                        echo '</div>';
                        echo '<div class="food-menu-desc">';
                        echo '<h3>' . $row['name'] . '</h3>';
                        echo '<p class="food-price">' . $row['description'] . '</p>';
                        echo '<p class="food-detail">Address: ' . $row['address'] . '</p>';
                        echo '<p class="food-detail">Contact: ' . $row['contact'] . '</p>';
                        echo '<label for="restaurant_' . $row['restaurant_id'] . '">Select  </label>';
                        echo '<input type="checkbox" name="selected_restaurants[]" id="restaurant_' . $row['restaurant_id'] . '" value="' . $row['restaurant_id'] . '">';
                        echo '</div>';
                        echo '</fieldset>';
                    }
                } else {
                    echo 'No restaurants found.';
                }
                ?>

                <fieldset>
                    <legend>Reservation Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. John Doe" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9876543210" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. john@example.com" class="input-responsive" required>

                    <div class="order-label">Reservation Date</div>
                    <input type="date" name="reservation_date" class="input-responsive" required>

                    <div class="order-label">Reservation Time</div>
                    <input type="time" name="reservation_time" class="input-responsive" required>

                    <div class="order-label">Number of People (Pax)</div>
                    <select name="num_people" class="input-responsive" required>
                        <?php
                        // Display options from 1 to 6
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>

                    <input type="submit" name="submit" value="Confirm Reservation" class="btn btn-primary">
                </fieldset>
            </form>

        </div>
    </section>
    <!-- Reservation Form Ends Here -->
	
	 <!-- Payment Gateway Form Starts Here -->
<section class="container payment-form">
    <form action="payment_form.php" method="post">
        <h2 class="text-center text-white">Proceed to Payment</h2>

        <!-- Billing Address Section -->
        <div class="row">
            <div class="col">
                <h3 class="title">Billing Address</h3>
                <div class="inputBox">
                    <span>Full Name :</span>
                    <input type="text" name="full_name" placeholder="Enter your full name" required>
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <!-- Add more billing address fields as needed -->
            </div>

            <!-- Payment Information Section -->
            <div class="col">
                <h3 class="title">Payment</h3>
                <div class="inputBox">
                    <span>Name on Card :</span>
                    <input type="text" name="name_on_card" placeholder="Enter name on card" required>
                </div>
                <div class="inputBox">
                    <span>Credit Card Number :</span>
                    <input type="text" name="credit_card_number" placeholder="Enter credit card number" required>
                </div>
                <div class="inputBox">
                    <span>Expiration Month :</span>
                    <input type="text" name="exp_month" placeholder="Enter expiration month" required>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Expiration Year :</span>
                        <input type="number" name="exp_year" placeholder="Enter expiration year" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv" placeholder="Enter CVV" required>
                    </div>
                </div>
                <div class="inputBox">
                    <span>Amount :</span>
                    <input type="number" name="amount" step="0.01" placeholder="Enter amount (RM)" required>
                </div>
            </div>
        </div>

        <input type="submit" value="Proceed to Payment" class="submit-btn">
    </form>
</section>
<!-- Payment Gateway Form Ends Here -->

    <!-- Social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- Social Section Ends Here -->

    <!-- Footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">GROUP 2</a></p>
        </div>
    </section>
    <!-- Footer Section Ends Here -->

</body>

</html>