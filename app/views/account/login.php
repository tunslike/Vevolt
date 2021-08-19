<?php
   require APPROOT . '/views/includes/header.php';
?>
<div class="innerheader">
<div class="loginTitle">
    Login into your account
</div>
</div>

<div class="loginbox">
    <h5 class="logintitle"><i style="margin-right:5px;" class="fas fa-user"></i> Provide your login details to access your account</h5>

    <form action="<?php echo URLROOT; ?>/account/login" method ="POST">
    <div class="loginform">
    <i class="far fa-envelope loginicon"></i>
    <input type="text" name="" placeholder="Email Address">
    </div>
    <div class="loginform">
    <i class="fas fa-lock loginicon"></i>
    <input type="password" name="" placeholder="Password">
    </div>
    <div class="loginBtn">
        <div class="remboxme">
        <input type="checkbox" name="remberMe" id="">
            <label for="remberMe">Remember me</label>
        </div>
        <div>
            <button class="loginbutton">Sign In</button>
        </div>
    </div>
</form>
    <br>
<div class="forgotpwd">
<a href="#">
        Forgot your password? Click here
    </a>
</div>
    
</div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>