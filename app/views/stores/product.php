<!-- HEADER -->
<?php
   require APPROOT . '/views/includes/header.php';
?>

<div class="innerheader" style="padding-top:1%; padding-bottom:2%;">
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo URLROOT; ?>/index"><i class="fas fa-home"></i></a></li>
            <li><i class="fas fa-chevron-right" style="color:#e23c3c; font-size: 13px; margin: 0px -2px;"></i></li>
            <li><a href="<?php echo URLROOT; ?>/index">Products</a></li>
            <li><i class="fas fa-chevron-right" style="color:#e23c3c; font-size: 13px; margin: 0px -2px;"></i></li>
            <li><a href="#"><?php echo $data['details']->CATEGORY; ?></a></li>
        </ul>
    </div>
    <div class="productHeaderTitle">
        <?php echo $data['details']->NAME; ?>
    </div>
</div>

<!-- BODY -->
<div class="productBody">
    <div class="productBodyContainer">
        <div class="productBodyCol">
        <img src="<?php echo URLROOT; ?>/public/images/products/<?php echo $data['details']->FILE_NAME; ?>?v=<?php echo rand(10000000000,99999999999); ?>" />
        </div>
        <div class="productBodyCol">
        <form action="<?php echo URLROOT; ?>/stores/createCart" method ="POST">
            <h5 class="productBodyTitle"><?php echo $data['details']->NAME; ?></h5>
            <ul>
                <li>Product Code: <span><?php echo $data['details']->PRODUCT_CODE; ?></span></li>
                <li>Manufacturer:  <span><?php echo $data['details']->MANUFACTURER; ?></span> </li>
                <li>Status: <?php echo ($data['details']->QUANTITY == 0) ? '<span style="margin-left:70px;">Out of Stock</span>' : '<span style="color:blue; margin-left:70px;">In Stock</span>'; ?></li>
            </ul>
            <h6>Description</h6>
            <p><?php echo $data['details']->DESCRIPTION; ?></p>
            
            <div class="productAmount">
            ₦ <?php echo number_format($data['details']->AMOUNT, 2); ?>
            </div>
            <div class="productQty">
                <div>Quantity:</div> 
                <input type="number" min="1" value="1" onchange="ValidateQuantityField(this.value)" class="qtyval" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
                <a href="#"><i class="fas fa-shopping-basket"></i> Click here for bulk purchase</a>
            </div>
            <input type="hidden" name="productid" value="<?php echo $data['details']->PRODUCT_ID; ?>">
            <div class="productBuy">
                <button>Buy Now <i class="fas fa-angle-double-right"></i></button>
            </div>
            <div class="recommendProduct">
            <a href="#"><i class="fas fa-hand-point-right"></i> Recommend product to someone?</a>
            </div>
        </form>
        </div>
    </div>

    <br>
    <br>
    <div class="productBodyContainer">
        tunslike
    </div>
</div>

<!-- FOOTER -->
<?php
   require APPROOT . '/views/includes/footer.php';
?>