<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
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

    <!-- Edit Review Form Section Starts Here -->
    <section class="review-form">
        <div class="container">
            <h2 class="text-center">Edit Review</h2>
            <?php
            // Include the database configuration file
            include 'config.php';

            // Check if review_id is set in the URL
            if (isset($_GET['review_id'])) {
                $edit_review_id = mysqli_real_escape_string($conn, $_GET['review_id']);
                $edit_sql = "SELECT * FROM reviews WHERE review_id = $edit_review_id";
                $edit_result = mysqli_query($conn, $edit_sql);

                if ($edit_result && mysqli_num_rows($edit_result) > 0) {
                    $edit_row = mysqli_fetch_assoc($edit_result);
            ?>
                    <form action="update_review.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="review_id" value="<?php echo $edit_row['review_id']; ?>">
                        <label for="restaurant">Select a Restaurant:</label>
                        <select name="restaurant" id="restaurant" required>
                            <?php
                            // Fetch restaurant data from the database
                            $result = mysqli_query($conn, "SELECT restaurant_id, name FROM restaurant");

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $selected = ($row['restaurant_id'] == $edit_row['restaurant_id']) ? 'selected' : '';
                                    echo "<option value='{$row['restaurant_id']}' $selected>{$row['name']}</option>";
                                }
                            }
                            ?>
                        </select>
                        <br>
                        <label for="rating">Rating:</label>
                        <input type="radio" name="rating" value="1" <?php echo ($edit_row['rating'] == 1) ? 'checked' : ''; ?> required> 1
                        <input type="radio" name="rating" value="2" <?php echo ($edit_row['rating'] == 2) ? 'checked' : ''; ?> required> 2
                        <input type="radio" name="rating" value="3" <?php echo ($edit_row['rating'] == 3) ? 'checked' : ''; ?> required> 3
                        <input type="radio" name="rating" value="4" <?php echo ($edit_row['rating'] == 4) ? 'checked' : ''; ?> required> 4
                        <input type="radio" name="rating" value="5" <?php echo ($edit_row['rating'] == 5) ? 'checked' : ''; ?> required> 5
                        <br><br>
                        <label for="content">Review:</label>
                        <textarea name="content" id="content" rows="4" required><?php echo $edit_row['content']; ?></textarea>
                        <br>
                        <label for="image">Upload Picture:</label>
                        <input type="file" name="image" id="image" accept="image/*">
                        <br><br>
                        <input type="submit" name="submit" value="Update Review" class="btn btn-primary">
                    </form>
            <?php
                } else {
                    echo "Error fetching review details: " . mysqli_error($conn);
                }
            } else {
                echo "Review ID not set in the URL.";
            }
            ?>
        </div>
    </section>
    <!-- Edit Review Form Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">GROUP 2</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
</body>

</html>
