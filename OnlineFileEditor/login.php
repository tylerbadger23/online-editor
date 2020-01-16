<?php 
require "./headers/header.php";   
require "./config/config.php";
?>


<form action="form_handlers/login_user.php" method="post" id='login-form'>
    <div class="form-center">
        <h2 class='left-login'>Login</h2>
        <p class='red-msg' style='color:green'><?php  if(isset($_GET['r'])){
            echo($_GET['r']);
        }?></p>
        <br>

        <p class='success-msg' style='color:green'><?php if(isset($_GET['success'])){
            echo($_GET['success']); }?></p>

        <input type="email" name="log_email" placeholder="Enter email">
        <input type="password" name="log_pw" placeholder="Enter password">
        <input type="hidden" name="redirect" value='<?php if(isset($_GET['rp'])) {    
        echo($_GET['rp']) ;}?>'>
        <br>
        <input type="submit" value='Login'>
        <br>
        <br>
        <a href="register.php" class='signuplink'>Sign Up For Free</a>
        <p class='error-msg' style='color:red'><?php if(isset($_GET['error'])){
            echo($_GET['error']);
        }?></p>
    </div>
</form>

</body>
</html>