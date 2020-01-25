<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="./icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icon/favicon-16x16.png">

    <link rel="stylesheet" type="text/css" href="./design/Semantic/semantic.min.css">

    <link rel="manifest" href="./icon/site.webmanifest">
    <title><?php  echo(displayTitle(basename($_SERVER['PHP_SELF'])))?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
    <link rel="stylesheet" href="./design/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
</head>
<body>

<?php if(isset($_SESSION['username'])) { 
        $username = $_SESSION['username']; ?>

    <?php if(basename($_SERVER['PHP_SELF']) == "file.php") { ?>
        <nav class='dark-nav'>
            <div class="links">
                <form action="./form_handlers/logout.php" method="get">
                    <li><a href="index.php">Projects</a></li>
                    <li><a href="file.php?id=false">Create</a></li>
                    <li><a href="account.php?sun=<?php echo($username)?>">Account</a></li>
                    <li><button type="submit">Log Out</button></li>
                </form>
            </div>
        </nav> 
    <?php } else if(basename($_SERVER['PHP_SELF']) == "account.php" || basename($_SERVER['PHP_SELF']) == "index.php") { ?>
        <nav class='dark-nav'>
            <div class="links">
                <form action="./form_handlers/logout.php" method="get">
                    <li><a href="index.php">Projects</a></li>
                    <li><a href="file.php?id=false">Create</a></li>
                    <li><a href="account.php?sun=<?php echo($username)?>">Account</a></li>
                    <li><button type="submit">Log Out</button></li>
                </form>
            </div>
        </nav> 
    <?php }
    
    else{ ?>
        <nav class='light-nav'>
            <div class="links">
                <form action="./form_handlers/logout.php" method="get">
                    <li><a href="index.php">Projects</a></li>
                    <li><a href="file.php?id=false">Create</a></li>
                    <li><a href="account.php?sun=<?php echo($username);?>"">Account</a></li>
                    <li><button type="submit">Log Out</button></li>
                </form>
            </div>
        </nav> 
    <?php }?>

<?php } else if(basename($_SERVER['PHP_SELF']) == "register.php" || basename($_SERVER['PHP_SELF']) == "login.php" ) { ?>
        <nav class='light-nav'>
            <div class="links">
                <li><a href="">About</a></li>
                <li><a href="">Preview Editor</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </div>
        </nav> 
    <?php }
    else { ?>
    <nav class='light-nav'>
        <div class="links">
            <li><a href="">About</a></li>
            <li><a href="">Preview Editor</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </div>
    </nav>
<?php }?>

            

