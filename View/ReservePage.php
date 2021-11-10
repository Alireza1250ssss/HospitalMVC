<?php

$weekdays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$blockedId = [];
foreach ($blocked as $item)
    $blockedId[$item['user_id']] = $item['weekday'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/css/hospital.css">
    <title>Hospital</title>
</head>

<body>
    <form action="/Hospital/paymentStep1" method="post">
    <a href="" class="p-3 bg-success">Reserve a Visit</a>
    <div class="container flex-wrap flex-column-md">
        <?php foreach ($list as $doctor) : 
            if($blockedId[$doctor['user_id']] == $doctor['week_day'] ) continue;
            ?>
            <label >
                <h4><?php echo $doctor['first_name']; ?></h4><br>
                <h4><?php echo $doctor['last_name']; ?></h4>
                <hr>
                <h4><?php echo "from : " . $doctor['start_time']; ?></h4><br>
                <h4><?php echo "to : " . $doctor['end_time']; ?></h4>
                <hr>
                <h4><?php echo $weekdays[$doctor['week_day']] ?></h4>
                <input type="radio" name="resdetails" value=<?php echo $doctor['user_id'] ."-".$id. "-" . $doctor['week_day'] ?> id=<?php echo $doctor['user_id'] ?>>
            </label>
        <?php endforeach; ?>
    </div>
    <div class="bank" style="display: none;">
    <h3>Choose the Bank You Want to Pay</h3><br><br>
        <label >
            <img src="files/melli.png" alt="ملی">
            <input type="radio" name="bank" value="Melli">
        </label>
        <label >
            <img src="files/mellat.png" alt="ملت">
            <input type="radio" name="bank" value="Mellat">
        </label>
        <label >
            <img src="files/saderat.png" alt="صادرات">
            <input type="radio" name="bank" value="Saderat">
        </label>
    </div>
    <button type="submit" id="paybtn" style="display: none;">Pay the Reservation</button>
    </form>
    <script src="styles/js/hospital.js"></script>
</body>

</html>