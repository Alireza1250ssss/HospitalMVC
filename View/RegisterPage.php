<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/hospital.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
    <title>Hospital</title>
</head>

<body>
    <h3 class="my-3 p-4 text-center bg-transparent">Dear Patient ! Please Register First to Be Able to Use This Website</h3>
    <form action="/Hospital/reservation" method="post">
        <input type="text" name="fname" placeholder="First Name" class="form-control my-2 w-50" required>
        <input type="text" name="lname" placeholder="Last Name" class="form-control my-2 w-50" required>
        <select name="gender" class="form-control my-2 w-50">
            <option value="0">man</option>
            <option value="1">woman</option>
        </select>
        <input type="number" name="age" placeholder="Age" class="form-control my-2 w-50">
        <input type="number" name="national_code" placeholder="National Code" class="form-control my-2 w-50" required>
        <input type="number" name="phone" placeholder="Phone" class="form-control my-2 w-50" required>
        <button type="submit" class="form-control w-50">Register</button>
    </form>
    <?php if($_SESSION['error']) : ?>
        <p class="error"><?php echo $_SESSION['error']; ?></p>
    <?php removeFromSession('error'); endif; ?>
</body>

</html>