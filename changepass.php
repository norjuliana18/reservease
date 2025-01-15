<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,  initial-scale=1.0">
	<title>Change Password</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/group_logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    </li>
                    <button class="btnLogin-popup">Login</button>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
</header>
<div class="body2">
<div class="wrapper">
    <div class="form-box login">
        <h2 style="color: #ff6b81;">Change Password</h2>
        <form action="changepass_action.php" method="post">
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
		 <label for="userPwd" style="color: #ff6b81;">Password</label>
                <input type="password" name="userPwd" required>
                <br><br>
                <button type="submit" class="btn">Change</button>
            </div>

        </form>
    </div>
</div>
</div>
<script src="js/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
