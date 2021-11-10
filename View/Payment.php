<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/payment.css">
    <title>Pay Part</title>
</head>
<body>
    <div class="pay-container">
        <h3>
            <p>The Cost You Pay Is :</p>
            <p><?php echo $cost." Toman" ?></p>
        </h3>
        <input type="number" name="cartnumber" id="cartnumber" placeholder="Your Cart Number">
        <input type="number" name="cartpassword" id="cartpassword" placeholder="Your Cart Password">
        <button id="finalpaybtn">PAY</button><hr>
        <span><?php echo $bankType."  Services" ?>   &#169;</span>
    </div>
    <p id="status"></p>
    <script src="styles/js/payment.js"></script>
</body>
</html>