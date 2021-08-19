<?php
   require APPROOT . '/views/includes/header.php';
?>
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
        Do you want your products on Vevolt? <br> sign up and create a <span style="color:#e23c3c;">store</span> to get started
        </div>
            <div>
            <a href="#" style="text-decoration:none;" class="createStorebtn"><i style="margin-right:10px;" class="fas fa-store"></i> Create a Store</a>
            </div>
    </div>
</div>
<div class="topleads">
    <div class="container">
        <div class="topleadheader">
        <i style="margin-right:10px;" class="fas fa-shopping-basket"></i> Browse by Category
        </div>
        <div class="topleaderbody">
            <div class="row">
                <a href="#">
                <div class="col-lead">
                    <img src="<?php echo URLROOT; ?>/public/images/catImg2.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <h2 class="serviceImg1">Generator Parts/Sets</h2>
                </div>
                </a>
                <a href="#"><div class="col-lead">
                <img src="<?php echo URLROOT; ?>/public/images/catImg3.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <h2 class="serviceImg2">Engine Oils / Service Kits</h2>
                </div></a>
                <a href="#"><div class="col-lead">
                <img src="<?php echo URLROOT; ?>/public/images/catImg4.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <h2 class="serviceImg3">General Service Parts</h2>
                </div></a>
            </div>
        </div>
    </div>
</div>


<?php
   require APPROOT . '/views/includes/footer.php';
?>

