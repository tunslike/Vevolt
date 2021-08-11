<?php
   require APPROOT . '/views/includes/header.php';
?>
<header>
    <div class="topnav">
        <div class="helpText">
        <i style="margin-right:5px;" class="fas fa-question-circle"></i> Need help? contact <span style="color:#ffe400">help@vevolt.ng</span> 
        </div>
        <div class="topnavright">
            <div class="vendorLogin"><a href="#"><i style="margin-right:5px;" class="fas fa-users"></i> Vendor Login</a></div>
        </div>
    </div>
    <div class="logoarea">
        <img src="<?php echo URLROOT; ?>/public/images/logo.jpg?v=<?php echo rand(10000000000,99999999999); ?>" alt="Logo" width="150px" />
        <nav>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">STORE</a></li>
                <li><a href="#">VENDOR</a></li>
                <li><a href="#">REQUESTS</a></li>
            </ul>
        </nav>
        <div style="padding-bottom:10px; display:flex;">
        <a class="signin" href="#"><i style="margin-right:5px;" class="fa fa-user"></i> Sign In</a>
        <a class="signup" href="#">Register here</a>
        </div>
    </div>
</header>

<main>
    <div class="display">
        <div class="displayContents animate__bounceIn animate__infinite	infinite">
        Buying <span style="color:#ffe400;">realiable parts</span> at our store will ensure a <span style="color:#ffe400;">smooth operation</span> of your equipment
        </div>
        <div class="mainsearch">
        <form action="/action_page.php" method="get" id="form1">
            <div class="iconsearch"><i class="fas fa-search"></i></div>
            <input type="text" placeholder="Search here: Ex. Generator parts, service, drum oil" id="lname" name="lname" />
            <select name="category" id="">
                <option selected="selected" value="0">Category</option>
                <option value="0">Option 1</option>
                <option value="0">Option 2</option>
            </select>
            <button type="submit" form="form1" value="Submit">Search</button>
        </form>
        </div>
    </div>
</main>
<div class="registervendor">
    <div class="regcontainer">
        <div class="createStoretxt">
        Do you want your products on Vevolt? <br> sign up and create a store to get started
        </div>
            <div>
            <a href="#" style="text-decoration:none;" class="createStorebtn"><i style="margin-right:10px;" class="fas fa-store"></i> Create a Store</a>
            </div>
    </div>
</div>


<?php
   require APPROOT . '/views/includes/footer.php';
?>

