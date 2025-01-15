<?php
include 'config.php';  // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO payment (
                full_name, 
                email, 
                name_on_card, 
                credit_card_number, 
                exp_month, 
                exp_year, 
                cvv,
                amount
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssssd", 
            $param_full_name, 
            $param_email, 
            $param_name_on_card, 
            $param_credit_card_number, 
            $param_exp_month, 
            $param_exp_year, 
            $param_cvv,
            $param_amount
        );

        // Set parameters
        $param_full_name = isset($_POST['full_name']) ? $_POST['full_name'] : null;
        $param_email = isset($_POST['email']) ? $_POST['email'] : null;
        $param_name_on_card = isset($_POST['name_on_card']) ? $_POST['name_on_card'] : null;
        $param_credit_card_number = isset($_POST['credit_card_number']) ? $_POST['credit_card_number'] : null;
        $param_exp_month = isset($_POST['exp_month']) ? $_POST['exp_month'] : null;
        $param_exp_year = isset($_POST['exp_year']) ? $_POST['exp_year'] : null;
        $param_cvv = isset($_POST['cvv']) ? $_POST['cvv'] : null;
        $param_amount = isset($_POST['amount']) ? $_POST['amount'] : null;

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            header("Location: thank_you.php?success=1");
            exit();
        } else {
            // Payment failed
            echo "Payment failed. Please try again later.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
