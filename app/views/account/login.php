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
    <div class="errorMsgBox">
    <i class="fas fa-times" style="margin-right:5px; font-size:16px;"></i> Error: <span id="ermsg"></span>
    </div>
    <?php if(isset($_GET['r'])) : ?>
        <div class="successMsgBox">
        <i class="fas fa-check" style="margin-right:5px; font-size:16px;"></i> You have been successfully logged out!
        </div>
    <?php endif; ?>

    <?php if(!empty($data['errorMessage']) && $data['errorMessage'] != '') : ?>
        <div class="errorMsgBox" style="display:block">
        <i class="fas fa-times" style="margin-right:5px; font-size:16px;"></i> <?php echo $data['errorMessage']; ?>
    </div>
    <?php endif; ?>
    
    <form action="<?php echo URLROOT; ?>/account/login" onsubmit="return validateLoginForm();" method ="POST">
    <div class="loginform">
    <i class="far fa-envelope loginicon"></i>
    <input type="text" name="usern" id="usern" placeholder="Email Address">
    </div>
    <div class="loginform">
    <i class="fas fa-lock loginicon"></i>
    <input type="password" name="entry" id="entry" placeholder="Password">
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