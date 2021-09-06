<!-- HEADER -->
<?php
   require APPROOT . '/views/includes/header.php';
?>

<?php $subTotal = 0.00; ?>

<div class="innerheader" style="padding-top:1%; padding-bottom:2%;">
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo URLROOT; ?>/index"><i class="fas fa-home"></i></a></li>
            <li><i class="fas fa-chevron-right" style="color:#e23c3c; font-size: 13px; margin: 0px -2px;"></i></li>
            <li><a href="<?php echo URLROOT; ?>/index">Products</a></li>
            <li><i class="fas fa-chevron-right" style="color:#e23c3c; font-size: 13px; margin: 0px -2px;"></i></li>
            <li>Product Name</li>
        </ul>
    </div>
    <div class="productHeaderTitle">
        My Shopping Cart
    </div>
</div>

<div class="productBody">
    
    <div class="cartwindow">

        <div class="leftcol">
            <div class="headercol">
                <div style="flex-basis:35%;">Item Details</div>
                <div>Quantity</div>
                <div>Item Price</div>
                <div>Action</div>
            </div>

            <?php foreach($data['cart'] as $product): ?>

                <?php $subTotal += $product->AMOUNT; ?>

                    <div class="leftcartbody">
                        <div style="flex-basis:35%;">
                            <div style="display:flex; flex-direction:row; column-gap: 30px; align-items:center">
                                <img src="<?php echo URLROOT; ?>/public/images/products/<?php echo $product->FILE_NAME; ?>?v=<?php echo rand(10000000000,99999999999); ?>" />
                                <h6><?php echo $product->NAME; ?></h6>
                            </div>
                        </div>
                            <div style="padding: 30px; padding-left:65px;"><input type="number" onchange="ValidateQuantityField(this.value)" class="qtyval" min="1" value="1" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"></div>
                            <div class="cartAmount">₦ <?php echo number_format($product->AMOUNT,2); ?></div>
                            <div style="padding: 30px;"><a href="<?php echo URLROOT.'/stores/removeCart?pid='.$product->PRODUCT_ID ?>"><i style="font-size:18px;" class="fas fa-trash-alt"></i></a></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="rightcol">

            <form action="<?php echo URLROOT; ?>/stores/checkout" method ="POST">
                <div class="headercol">
                    <div><i class="fas fa-shopping-cart"></i> Order Summary</div> 
                    <div class="QtyItem"><?php echo count($data['cart']) ?> Item</div>
                </div>
                <div class="midwindow">
                    <div>Subtotal</div> 
                    <div>₦ <?php echo number_format($subTotal, 2); ?></div>
                </div>
                <div class="midwindow">
                    <div>Delivery Charges</div> 
                    <div class="delivery">Fee will be apply at checkout</div>
                </div>
                <div class="midwindow">
                    <div class="totalFee">Total:</div> 
                    <div class="totalFee">₦ <?php echo number_format($subTotal, 2); ?></div>
                </div>
                <div class="checkoutbtn">
                <button>Continue to checkout <i class="fas fa-shopping-basket"></i></button>
                </div>
                <div class="paymentinfo">
                    <div><img src="<?php echo URLROOT; ?>/public/images/secured.png?v=<?php echo rand(10000000000,99999999999); ?>" /></div>
                    <div><h6>Transactions are 100% safe and secure </h6></div>
                </div>
            </form>
        </div>
    </div>

</div>



<!-- FOOTER -->
<?php
   require APPROOT . '/views/includes/footer.php';
?>