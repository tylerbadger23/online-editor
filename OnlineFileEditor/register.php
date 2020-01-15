<?php require "./headers/header.php"; 
require "./config/config.php";
?>

<h2>Register For A Account</h2>

<form action="form_handlers/register_user.php" method="post">

    <input type="email" name="reg_email" placeholder="Enter email" required>
    <input type="password" name="reg_pw" placeholder="Choose a secure password" required>
    <input type="password" name="reg_pw2" placeholder="Type password again." required>

    <button type="submit">Register</button>
    <br>
    <p class='error-msg' style='color:red'><?php echo($_GET['error'])?></p>
    <a href="login.php">Sign in</a>


</form>

</body>
</html>