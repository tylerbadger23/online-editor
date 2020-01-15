<?php require "./headers/header.php"; 
require "./config/config.php";
?>

<form action="form_handlers/register_user.php" method="post" id='login-form'>
    <h2 class='left-login'>Create Account</h2>
    <br>

    <input type="email" name="reg_email" placeholder="Enter email">
    <br>
    <input type="password" name="reg_pw" placeholder="Enter password">
    <input type="password" name="reg_pw2" placeholder="Enter password Again">
    <input type="hidden" name="redirect" value='<?php if(isset($_GET['rp'])) {    
    echo($_GET['rp']) ;}?>'>
    <br>
    <input type="submit" value='Sign Up'>
    <br>
    <br>
    <a href="login.php" class='signuplink'>Already have an account?</a>
    <p class='error-msg' style='color:red'><?php if(isset($_GET['error'])){
        echo($_GET['error']);
    }?></p>
</form>

</body>
</html>