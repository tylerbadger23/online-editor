<?php 
require "./config/config.php";
require "./headers/header.php"; 
?>
<div class="login-bg">
    <div class="form-center register">
    <h2 class='left-login'>Create Account</h2>
    <br>
        <form class="ui form" action="form_handlers/register_user.php" method="post">
        <div class="field">
            <label>Email</label>
            <input type="text" name="reg_email" placeholder="Enter your email" required>
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="reg_pw" placeholder="Choose a strong password" required>
        </div>
        <div class="field">
            <label>Password Again</label>
            <input type="password" name="reg_pw2" placeholder="Type your password again" required>
        </div>
        <div class="field">
            <label>Username</label>
            <input type="text" name="reg_username" placeholder="Choose a username" required>
        </div>
        <p class='error-msg' style='color:red'><?php if(isset($_GET['error'])){
                    echo($_GET['error']);
        }?></p>
        <button class="ui button" type="submit">Register</button>
        <div class="field">
            <div class="ui">
            <a href="login.php" class='switch-link'>Already have an account?</a>
            </div>
        </div>
        <input type="hidden" name="redirect" value='<?php if(isset($_GET['rp'])) {    
                echo($_GET['rp']) ;}?>'>
        </form>
    </div>
</div>
</body>
</html>