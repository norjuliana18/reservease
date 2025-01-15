<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,  initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="body2">
<div class="wrapper">
    <div class="form-box login">
        <h2 style="color: #ff6b81;">Login</h2>
        <form action="login_action.php" method="post">
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" name="userEmail" required>
                <label style="color: #ff6b81;">Email</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                    </span>
                <input type="password" name="userPwd" required>
                <label style="color: #ff6b81;">Password</label>
                <br>
                <button type="submit" class="btn">Login</button>
                <a href="changepass.php">Forgot Password?</a>
                <div class="login-register">
                    <p>Dont have an account? <a href="register.php">Register</a>
                    </p>
                </div>
            </div>

        </form>
    </div>
</div>
</div>
<script src="js/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>