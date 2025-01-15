<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Gateway</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paymentstyle.css">

</head>

<body>

    <div class="container">

        <form action="payment_form.php" method="post">

            <div class="row">

                <div class="col">

                    <h3 class="title">Billing Address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" name="full_name" placeholder="Ali bin Abu">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" name="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" name="address" placeholder="House No. - Street - Locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" name="city" placeholder="Kota Kinabalu">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" name="state" placeholder="Malaysia">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" name="zip_code" pattern="\d{5}" title="Zip code must be 5 digits"
                                placeholder="98000" required>
                        </div>

                    </div>

                </div>

                <div class="col">

                    <h3 class="title">Payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="images/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" name="name_on_card" placeholder="Mr. Ali Bin Abu">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="text" name="credit_card_number" pattern="\d{16}"
                            title="Credit card number must be 16 digits" placeholder="1111-2222-3333-4444" required>
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" name="exp_month" placeholder="January">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" name="exp_year" pattern="\d{4}" title="Exp year must be 4 digits"
                                placeholder="2025" required>
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" name="cvv" pattern="\d{3}" title="CVV must be 3 digits" placeholder="123"
                                required>
                        </div>
                    </div>

                    <div class="inputBox">
                        <span>Amount :</span>
                        <input type="number" name="amount" step="0.01" placeholder="Enter amount (RM)" required>
                    </div>

                </div>

            </div>

            <input type="submit" value="proceed to checkout" class="submit-btn">

        </form>

    </div>

</body>

</html>