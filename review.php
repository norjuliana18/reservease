<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Review</title>
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

    <!-- Review Display Section Starts Here -->
    <section class="review-display">
        <div class="container">
            <h2 class="text-center">Reviews</h2>
            <?php
            // Include the database configuration file
            include 'config.php';

            // Example PHP code to fetch all reviews from the database
            $sql = "SELECT review_id, rating, content, review_image, created_at, updated_at FROM reviews ORDER BY review_id DESC";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    // output data of each review
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='review-post' onclick='showLargeReview(" . $row['review_id'] . ")'>";

                        // Display star icons based on the rating
                        echo "<p>Rating: ";
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $row["rating"]) {
                                echo "<i class='fa fa-star'></i>";
                            } else {
                                echo "<i class='fa fa-star-o'></i>";
                            }
                        }
                        echo "</p>";

                        echo "<p>Review: " . $row["content"] . "</p>";

                        // Check if the review image is uploaded
                        if (!empty($row["review_image"])) {
                            echo "<p><a href='" . $row["review_image"] . "' target='_blank'><img src='" . $row["review_image"] . "' alt='Review Image' style='width: 200px; height: 150px;'></a></p>";
                        }

                        // Display created or updated time
                        $timestamp = isset($row["updated_at"]) ? $row["updated_at"] : $row["created_at"];
                        if ($timestamp !== null) {
                            $formattedTime = date("F j, Y, g:i a", strtotime($timestamp));
                            echo "<p class='small-font'>Time: " . $formattedTime . "</p>";
                        }

                        // Edit and delete buttons with styling
                        echo "<p><a href='edit_review.php?review_id=" . $row['review_id'] . "' class='btn btn-primary'>Edit</a> | <a href='delete_review.php?review_id=" . $row['review_id'] . "' class='btn btn-primary'>Delete</a></p>";

                        echo "</div>";
                    }
                } else {
                    echo "No reviews available";
                }
            } else {
                echo "Error fetching reviews: " . mysqli_error($conn);
            }
            // Close the database connection
            mysqli_close($conn);
            ?>
            <script>
                function showLargeReview(reviewId) {
                    // Use JavaScript to redirect to a new page with the review details
                    window.location.href = 'largereview.php?review_id=' + reviewId;
                }
            </script>
        </div>
    </section>
    <!-- Review Display Section Ends Here -->

    <section class="review-form">
        <div class="container">
            <h2 class="text-center">Review & Rating</h2>

            <form action="submit_review.php" method="POST" enctype="multipart/form-data">
                <label for="restaurant">Select a Restaurant:</label>
  <select name="restaurant" id="restaurant" required>
  <option value="" disabled selected>Select a restaurant</option>
    <?php
    // Include the database connection configuration
    include('config.php');

    // Fetch restaurant data from the database
    $result = mysqli_query($conn, "SELECT restaurant_id, name FROM restaurant");

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['restaurant_id']}'>{$row['name']}</option>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</select>

                <br>
                <label for="rating">Rating:</label>
                <input type="radio" name="rating" value="1" required> 1
                <input type="radio" name="rating" value="2" required> 2
                <input type="radio" name="rating" value="3" required> 3
                <input type="radio" name="rating" value="4" required> 4
                <input type="radio" name="rating" value="5" required> 5
                <br><br>
                <label for="content">Review:</label>
                <textarea name="content" id="content" rows="4" required></textarea>
<br>
<label for="image">Upload Picture:</label>
<input type="file" name="image" id="image" accept="image/*">
<br><br>
<input type="submit" name="submit" value="Submit Review" class="btn btn-primary">
</form>
</div>
</section>
<!-- footer Section Starts Here -->
<section class="footer">
    <div class="container text-center">
        <p>All rights reserved. Designed By <a href="#">GROUP 2</a></p>
    </div>
</section>
<!-- footer Section Ends Here -->
</body>
</html>
