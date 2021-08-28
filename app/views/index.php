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
    </div>
</main>
<div class="registervendor">
    <div class="regcontainer">
        <div class="createStoretxt">
        Do you want your products on Vevolt? <br> sign up and create a <span style="color:#e23c3c;">store</span> to get started
        </div>
            <div>
            <a href="<?php echo URLROOT; ?>/vendors/createStore" style="text-decoration:none;" class="createStorebtn"><i style="margin-right:10px;" class="fas fa-store"></i> Create a Store</a>
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

<div class="productWindow">
    <div class="productheader">
        <div class="productheadertitle">
        <i style="margin-right:10px;" class="fas fa-shopping-bag"></i> Available Products
        </div>
        <div class="productFindheader">
            <a href="#">Can't find Product? Click here <i style="margin-left:5px; margin-right:5px;" class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="productcontainer">
        <!-- Left Side Display starts here-->
        <div class="productleftbox">
           <div class="leftsiderhdr">
           <i style="margin-right:10px;" class="fas fa-shopping-bag"></i> Product Requests
           </div>
           <div class="requestTab">
               <div class="reqcontent">
                    <div class="reqtabtime"><i class="fas fa-bell"></i></div>
                    <div class="reqtabmsg">Engine rotor machine</div>
               </div>
               <div class="reqTime"><i class="fas fa-clock" style="margin-right: 5px;"></i> Posted 2 days ago</div>
           </div>
           <div class="requestTab">
               <div class="reqcontent">
                    <div class="reqtabtime"><i class="fas fa-bell"></i></div>
                    <div class="reqtabmsg">Oil filter German Gens</div>
               </div>
               <div class="reqTime"><i class="fas fa-clock" style="margin-right: 5px;"></i> Posted 2 weeks ago</div>
           </div>
           <div class="requestTab">
               <div class="reqcontent">
                    <div class="reqtabtime"><i class="fas fa-bell"></i></div>
                    <div class="reqtabmsg">Original CAT Engine filter</div>
               </div>
               <div class="reqTime"><i class="fas fa-clock" style="margin-right: 5px;"></i> Posted 1 month ago</div>
           </div>
            <a href="#" class="allRequest">View all Requests</a>
           <!-- Request tab ends here-->

           <div class="middlesiderhdr">
           <i style="margin-right:10px;" class="fas fa-filter"></i> Filter Products By:
           </div>
           <div class="categoryList">
                <ul>
                    <li><a href="#"><i class="fas fa-angle-right" style="margin-right:10px;"></i> Requested Products</a></li>
                    <li><a href="#"><i class="fas fa-angle-right" style="margin-right:10px;"></i> New Products</a></li>
                    <li><a href="#"><i class="fas fa-angle-right" style="margin-right:10px;"></i> Best Selling Products</a></li>
                    <li><a href="#"><i class="fas fa-angle-right" style="margin-right:10px;"></i> Generator Parts/Set</a></li>
                    <li><a href="#"><i class="fas fa-angle-right" style="margin-right:10px;"></i> General Service Parts</a></li>
                    <li><a href="#"><i class="fas fa-angle-right" style="margin-right:10px;"></i> Engine Oils/Service Kits</a></li>
                </ul>
           </div>
        </div>
        <!-- Left Side Display ends here-->

        <!-- Right Side Display starts here-->
        <div class="productrightbox">
        <div class="productrow">
                <div class="productcolumn">
                    <img src="<?php echo URLROOT; ?>/public/images/products/prod1.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <div class="productname">
                    Engine Oil Filter
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="productDetails">
                    <div class="prodprice">
                    ₦ 4,500.00
                    </div>
                    <div class="prodCount">
                        15 Sold
                    </div>
                </div>
                </a>
                </div>
                <div class="productcolumn">
                    <img src="<?php echo URLROOT; ?>/public/images/products/prod2.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <div class="productname">
                    Engine Oil Filter
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="productDetails">
                    <div class="prodprice">
                    ₦ 4,500.00
                    </div>
                    <div class="prodCount">
                        15 Sold
                    </div>
                </div>
                </a>
                </div>
                <div class="productcolumn">
                    <img src="<?php echo URLROOT; ?>/public/images/products/prod3.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <div class="productname">
                    Engine Oil Filter
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="productDetails">
                    <div class="prodprice">
                    ₦ 4,500.00
                    </div>
                    <div class="prodCount">
                        15 Sold
                    </div>
                </div>
                </a>
                </div>
                <div class="productcolumn">
                    <img src="<?php echo URLROOT; ?>/public/images/products/prod4.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <div class="productname">
                    Engine Oil Filter
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="productDetails">
                    <div class="prodprice">
                    ₦ 4,500.00
                    </div>
                    <div class="prodCount">
                        15 Sold
                    </div>
                </div>
                </a>
                </div>
                <div class="productcolumn">
                    <img src="<?php echo URLROOT; ?>/public/images/products/prod5.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <div class="productname">
                    Engine Oil Filter
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="productDetails">
                    <div class="prodprice">
                    ₦ 4,500.00
                    </div>
                    <div class="prodCount">
                        15 Sold
                    </div>
                </div>
                </a>
                </div>
                <div class="productcolumn">
                    <img src="<?php echo URLROOT; ?>/public/images/products/prod6.jpg?v=<?php echo rand(10000000000,99999999999); ?>" />
                    <div class="productname">
                    Engine Oil Filter
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="productDetails">
                    <div class="prodprice">
                    ₦ 4,500.00
                    </div>
                    <div class="prodCount">
                        15 Sold
                    </div>
                </div>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
   require APPROOT . '/views/includes/footer.php';
?>

