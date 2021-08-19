<?php
   require APPROOT . '/views/includes/header.php';
?>
<div class="innerheader">
<div class="loginTitle">
    Register a new account
</div>
</div>

<div class="loginbox">
    <h5 class="logintitle"><i style="margin-right:5px;" class="fas fa-user"></i> Provide your details to register a new account</h5>

    <div class="loginform">
    <i class="fas fa-user-alt loginicon"></i>
    <input type="text" name="" placeholder="First Name *">
    </div>
<div class="loginform">
<i class="far fa-user loginicon"></i>
    <input type="text" name="" placeholder="Last Name *">
    </div>

    <div class="loginform">
    <i class="far fa-envelope loginicon"></i>
    <input type="text" name="" placeholder="Email Address *">
    </div>

    <div class="loginform">
    <i class="fas fa-phone-alt loginicon"></i>
    <input type="text" name="" placeholder="Phone Number *">
    </div>

    <div style="text-align:center; margin-top:40px">
    <button class="regbutton">Register New Account</button>
    </div>
    <br>
    
</div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>