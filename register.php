<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f8f8;
        }

        header {
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .body2 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            width: 800px;
			height: 680px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-box {
            padding: 20px;
        }

        .box {
            margin-bottom: 20px;
        }

        .box input,
        .box select {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .icon {
            margin-right: 10px;
        }

        .box label {
            color: #ff6b81;
            font-size: 14px;
            margin-left: 5px;
        }

        .btn {
            background-color: #ff6b81;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #e44d63;
        }
    </style>
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
                <h2 style="color: #ff6b81;">Register</h2>
                <form action="register_action.php" method="post">
                    <div class="input box">
                        <span class="icon"><ion-icon name="at-circle"></ion-icon></span>
                        <input type="text" name="username" required>
                        <label style="color: #ff6b81;">Username</label>
                    </div>
                    <div class="input box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="userEmail" required>
                        <label style="color: #ff6b81;">Email</label>
                    </div>
                    <div class="input box">
                        <span class="icon"><ion-icon name="accessibility"></ion-icon></span>
                        <select name="userRoles">
                            <option value="none">&nbsp</option>
                            <option value="1">System Admin</option>
                            <option value="2">Restaurant Admin</option>
                            <option value="3">Customer</option>
                        </select>
                        <label style="color: #ff6b81;">Roles</label>
                    </div>
                    <div class="input box">
                        <span class="icon"><ion-icon name="lock-open"></ion-icon></span>
                        <input name="userPwd" type="password" required>
                        <label style="color: #ff6b81;">Password</label>
                        <br>
                    </div>
                    <div class="input box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input name="confirmPwd" type="password" required>
                        <label style="color: #ff6b81;">Confirm Password</label>
                        <br>
                        <button type="submit" value="Register" class="btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
