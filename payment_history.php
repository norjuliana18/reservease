<?php
include 'config.php';  // Include your database connection file

// Initialize variables
$email = '';
$result = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email entered by the user
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Retrieve payment history for the specified email from the database
    $sql = "SELECT * FROM payment WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/payment-background.jpg');
            /* Replace 'your-background-image.jpg' with the actual image path */
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: #e8e7ea;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #27ae60;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #397d54;
            color: #fff;
        }

        .container form .submit-btn {
            width: 100%;
            padding: 6px;
            font-size: 17px;
            background: #27ae60;
            color: #fff;
            margin-top: 5px;
            cursor: pointer;
        }

        .container form .submit-btn:hover {
            background: #01735a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Check Payment History</h1>

        <!-- Form to enter email -->
        <form method="post" action="">
            <label for="email">Enter your email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <input type="submit" value="Check History">
        </form>

        <!-- Display payment history in a table if available -->
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <h3>Payment History for
                <?php echo htmlspecialchars($email); ?>
            </h3>

            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Created At</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalAmount = 0;
                    while ($row = mysqli_fetch_assoc($result)):
                        $totalAmount += $row['amount'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['full_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['created_at']; ?>
                            </td>
                            <td>
                                <?php echo $row['amount']; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td colspan="11" style="text-align: right; font-weight: bold;">Total Amount:</td>
                        <td style="font-weight: bold;">
                            <?php echo number_format($totalAmount, 2); ?>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php elseif ($result): ?>
            <p>No payment history found for the specified email.</p>
        <?php endif; ?>
        <br>
        <!-- Button to go back to index.php or any other page -->
        <form action="index.php" method="get">
            <button type="submit" class="submit-btn">Back to Home</button>
        </form>

    </div>
</body>

</html>