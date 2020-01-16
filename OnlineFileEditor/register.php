<?php require "./headers/header.php"; 
require "./config/config.php";
?>

<form action="form_handlers/register_user.php" method="post" id='login-form'>
    <div class="form-center">
        <h2 class='left-login'>Create Account</h2>
        <br>
        <div class="top-form">
            <input type="email" name="reg_email" placeholder="Enter email">
            <input type="text" name="reg_username" placeholder="Choose a username">
        </div>
        <br>

        <div class="bottom-form">
            <input type="password" name="reg_pw" placeholder="Enter password">
            <input type="password" name="reg_pw2" placeholder="Enter password Again">
        </div>
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
    </div>
</form>

</body>
</html>