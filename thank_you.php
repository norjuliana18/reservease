<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('images/thankyou-background.jpg');
            background-size: cover;
            background-position: center;
        }


        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #27ae60;
        }

        p {
            font-size: 18px;
        }

        .submit-btn {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thank You for Your Payment!</h1>
        <p>We appreciate your business. Your payment was successful.</p>

        <!-- Submit button to go back to index.php -->
        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
            <form action="index.php">
                <input type="submit" value="Back to Home" class="submit-btn">
            </form>
            <form action="payment_history.php">
                <input type="submit" value="Check Payment History" class="submit-btn">
            </form>
        </div>
</body>

</html>