<?php  
require "./config/config.php";
require "./headers/header.php";  
?>

<div class="login-bg">
    <div class="form-center register">
    <h2 class='left-login'>Sign In</h2>
    <br>
        <form class="ui form" action="form_handlers/login_user.php" method="post">
        <div class="field">
            <label>Email</label>
            <input type="text" name="log_email" placeholder="Enter your email" required>
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="log_pw" placeholder="Choose a strong password" required>
        </div>
            <p class='error-msg' style='color:red'><?php if(isset($_GET['error'])){
                echo($_GET['error']);
            }?></p>
        <p class='red-msg' style='color:green'><?php  if(isset($_GET['r'])){
                echo($_GET['r']);
            }?></p>
        <p class='success-msg' style='color:green'><?php if(isset($_GET['success'])){
                echo($_GET['success']); }?></p>
        <button class="ui button" type="submit">Register</button>

        <div class="field">
            <div class="ui">
            <a href="register.php" class='switch-link'>Create a account</a>
            </div>
        </div>

        <input type="hidden" name="redirect" value='<?php if(isset($_GET['rp'])) {    
                echo($_GET['rp']) ;}?>'>
        <input type="hidden" name="redirect" value='<?php if(isset($_GET['rp'])) {    
            echo($_GET['rp']) ;}?>'>
        </form>
    </div>
</div>

<script src="./effects.js"></script>
</body>
</html>