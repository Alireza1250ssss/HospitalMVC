
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/index.css">
    <title>LOG IN </title>
</head>
<body>
    <form action="\Hospital\adminLogin" method="post" id="adminform">
    <h3>Dear Admin ! Please Fill These Fields To Enter</h3>
    Email : <input type="email" name="email" id="email"><br>
    Password : <input type="password" name="password" id="password"><br>
    <button type="submit">log in</button>
    <?php if($_SESSION['error']): ?>
        <p class="error"><?php echo $_SESSION['error']; ?></p>
    <?php 
    removeFromSession('error');
    endif; ?>    
    </form>
</body>
</html>