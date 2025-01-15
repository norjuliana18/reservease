<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user_profile.css">

</head>

<body>
    <header>
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
    </header>

    <div class="user-profile-body">
        <div class="user-profile-wrapper">
            <div class="user-profile-form-box login">
                <h2 style="color: #ff6b81;">User Profile</h2>

 <?php
                session_start();
                include('config.php');

                // Retrieve user data and display it in the form
                // You can use the user ID from the session or another method to fetch user data
                if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
                    $userId = $_SESSION['userID']; // Replace with your actual session variable

                    // Fetch user data from the database based on the user ID
                    $userDataQuery = "SELECT * FROM user WHERE userID = $userId";
                    $userDataResult = mysqli_query($conn, $userDataQuery);

                    if ($userDataResult && mysqli_num_rows($userDataResult) > 0) {
                        $userData = mysqli_fetch_assoc($userDataResult);

                        // Display user data in the form
                        ?>
                        <form action="update_profile_action.php" method="post" enctype="multipart/form-data">
                            <div class="input box">
                                <span class="icon"><ion-icon name="at-circle"></ion-icon></span>
                                <input type="text" name="username" value="<?php echo $userData['username']; ?>" readonly>
                                <label style="color: #ff6b81;">Username</label>
                            </div>
                            <div class="input box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="email" name="userEmail" value="<?php echo $userData['userEmail']; ?>" readonly>
                                <label style="color: #ff6b81;">Email</label>
                            </div>
                            <div class="input box">
                                <span class="icon"><ion-icon name="accessibility"></ion-icon></span>
                                <input type="text" value="<?php echo $userData['userRoles']; ?>" readonly>
                                <label style="color: #ff6b81;">Roles</label>
                            </div>
                            <div class="input box">
							<label style="color: #ff6b81;">Bio</label>
							<br>
							<textarea name="bio"><?php echo isset($userData['bio']) ? $userData['bio'] : ''; ?></textarea>
							</div>
							<button type="submit" value="Update Profile" class="btn">Update Profile</button>
                       
                        </form>
                        <?php
                    } else {
                        echo "User not found.";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                } else {
                    echo "User ID not found in session.";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>

