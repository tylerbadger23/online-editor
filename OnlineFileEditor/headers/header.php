<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="./icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icon/favicon-16x16.png">
    <link rel="manifest" href="./icon/site.webmanifest">
    <title><?php  echo(displayTitle(basename($_SERVER['PHP_SELF'])));?></title>
    <link rel="stylesheet" href="./design/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<?php  
    if(isset($_SESSION['username'])){
    ?>
<nav>
    <div class="links">
        <form action="./form_handlers/logout.php" method="get">
            <li><a href="index.php">Projects</a></li>
            <li><a href="file.php?id=false">Create</a></li>
            <li><a href="index.php">Account</a></li>
            <li><button type="submit">Log Out</button></li>
        </form>
    </div>
</nav> <?php } else { ?>
    <nav>
    <div class="links">
        <li><a href="">About</a></li>
        <li><a href="">Preview Editor</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
    </div>
</nav>
<?php } ?>
