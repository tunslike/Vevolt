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

<?php if(isset($_SESSION['cart'])) : ?>
<div class="stickyCartCount">
    <a href="#">
        <div><i class="fas fa-shopping-cart"></i></div>
        <div style="margin-top:10px;">1 Item</div>
    </a>
</div>
<?php endif; ?>

<div class="menuAreaFixed">
    <div class="logoareatop">
    <a href="<?php echo URLROOT; ?>/index" title="Back to Home"><img src="<?php echo URLROOT; ?>/public/images/logo.jpg?v=<?php echo rand(10000000000,99999999999); ?>" alt="Logo" width="100px" /></a>
    <div class="mainsearchtop">
        <form action="/action_page.php" method="get" id="form1">
            <div class="iconsearchtop"><i class="fas fa-search"></i></div>
            <input type="text" placeholder="Search here: Ex. Generator parts, service, drum oil" id="lname" name="lname" />
            <!--
            <select name="category" id="">
                <option selected="selected" value="0">Category</option>
                <option value="0">Option 1</option>
                <option value="0">Option 2</option>
            </select>
            -->
            <button type="submit" form="form1" value="Submit">Search</button>
        </form>
        </div>
    <div style=" display:flex; align-items:center;">

<?php if(isset($_SESSION['user_id'])) : ?>
    <a class="dashboard" href="<?php echo URLROOT; ?>/account/dashboard"><i style="margin-right:5px;" class="fa fa-user"></i> Hi, <?php echo $_SESSION['firstname']; ?> ...</a>
    <a class="signup" href="<?php echo URLROOT; ?>/account/logout">Log out <i style="margin-left:5px;" class="fas fa-sign-out-alt"></i></a>
<?php else : ?>
    <a class="signup" href="<?php echo URLROOT; ?>/account/login"><i style="margin-right:5px;" class="fa fa-user"></i> Sign In</a>
<?php endif; ?>
</div>
    </div>
</div>

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
        <a href="<?php echo URLROOT; ?>/index" title="Back to Home"><img src="<?php echo URLROOT; ?>/public/images/logo.jpg?v=<?php echo rand(10000000000,99999999999); ?>" alt="Logo" width="150px" /></a>
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

        <?php if(isset($_SESSION['user_id'])) : ?>
            <a class="dashboard" href="<?php echo URLROOT; ?>/account/dashboard"><i style="margin-right:5px;" class="fa fa-user"></i> Hi, <?php echo ucfirst($_SESSION['firstname']); ?></a>
            <a class="signup" href="<?php echo URLROOT; ?>/account/logout">Log out <i style="margin-left:5px;" class="fas fa-sign-out-alt"></i></a>
        <?php else : ?>
            <a class="signin" href="<?php echo URLROOT; ?>/account/login"><i style="margin-right:5px;" class="fa fa-user"></i> Sign In</a>
            <a class="signup" href="<?php echo URLROOT; ?>/account/register">Register here</a>
        <?php endif; ?>
        </div>
    </div>
</header>

