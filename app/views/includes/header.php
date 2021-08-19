<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100;200;300;400;500;600;700&family=Oxygen:wght@300;400;700&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="<?php echo URLROOT ?>/public/css/fontawesome/css/all.css?v=<?php echo rand(10000000000,99999999999); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/appStyle.css?v=<?php echo rand(10000000000,99999999999); ?>">
</head>
<body>
<div class="wrapper">    
<header>
    <div class="topnav">
        <div class="helpText">
        <i style="margin-right:5px;" class="fas fa-question-circle"></i> Need help? contact <span style="color:#ffe400; margin-left:10px;"><i class="fas fa-envelope" style="margin-right:5px;"></i> help@vevolt.ng  <span style="margin-left: 15px;"><i class="fas fa-phone-alt" style="margin-right:5px;"></i> 0709 9839 890</span><span style="color:#fff;"> (HOTLINE)</span></span>
        </div>
        <div class="topnavright">
            <div class="vendorLogin"><a href="#"><i style="margin-right:5px;" class="fas fa-users"></i> Vendor Login</a></div>
        </div>
    </div>
    <div class="logoarea">
        <img src="<?php echo URLROOT; ?>/public/images/logo.jpg?v=<?php echo rand(10000000000,99999999999); ?>" alt="Logo" width="150px" />
        <nav>
            <ul>
                <li><a href="<?php echo URLROOT; ?>/index">HOME</a></li>
                <li><a href="<?php echo URLROOT; ?>/aboutus">ABOUT US</a></li>
                <li><a href="<?php echo URLROOT; ?>/store">STORE</a></li>
                <li><a href="<?php echo URLROOT; ?>/vendor">VENDOR</a></li>
                <li><a href="<?php echo URLROOT; ?>/requests">REQUESTS</a></li>
            </ul>
        </nav>
        <div style="padding-bottom:10px; display:flex;">
        <a class="signin" href="<?php echo URLROOT; ?>/account/login"><i style="margin-right:5px;" class="fa fa-user"></i> Sign In</a>
        <a class="signup" href="<?php echo URLROOT; ?>/account/register">Register here</a>
        </div>
    </div>
</header>

