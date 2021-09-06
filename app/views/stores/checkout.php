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
            <li><i class="fas fa-chevron-right" style="color:#e23c3c; font-size: 13px; margin: 0px -2px;"></i></li>
            <li>My Cart</li>
        </ul>
    </div>
    <div class="productHeaderTitle">
        Checkout Information
    </div>
</div>

<form action="<?php echo URLROOT; ?>/stores/createOrder" onsubmit="return validateCreateStrore();" method ="POST">

<div class="productBody">
<?php if(!isset($_SESSION['firstname'])) : ?>
<div class="infoMsgBox" style="display:block; width:500px;">
    <i class="fas fa-info-circle" style="margin-right:5px; font-size:16px;"></i> Sorry, you are not logged in. Please <a href="<?php echo URLROOT.'/account/login?redirectUrl=checkout' ?>">Login</a> or <a href="<?php echo URLROOT.'/account/register?redirectUrl=checkout' ?>">Register</a> to proceed
</div>
<br>
<?php endif; ?>

    
    <div class="cartwindow">
        <div class="leftcol">
            <div class="checkdetails">
            <i class="fas fa-truck"></i>  Delivery Information
            </div>
            <div class="checkdetailsbody">
                <div class="deloptions">
                    <div>
                        <input type="radio" id="deladdr" onChange="switchDeliveryOption(); return false;" checked="checked" value="1" name="options">
                        <label for="">Deliver to my address</label>
                    </div>
                    <div>
                        <input type="radio" id="delloc" onChange="switchDeliveryOption(); return false;" value="2" name="options">
                        <label for="">I want to pick up from a pickup location</label>
                    </div>
                </div>

<br><br>                

            <!-- FORM STARTS -->
        <div id="deliveryWindow">
        <div class="formrow">
        <div class="loginform">
            <label for="usern">Delivery Full Name: <span style="color:#e23c3c; font-size:17px;">*</span></label>
            <input type="text" name="deliveryfname" <?php echo (!empty($data['user'])) ? 'readonly' : ''; ?> value="<?php echo (!empty($data['user'])) ? strtoupper($data['user']->FIRST_NAME.' '.$data['user']->LAST_NAME) : ''; ?>" >
        </div>
        <div class="loginform">
        <label for="usern">Delivery Address: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
        <input type="text" name="deliveryAddr" id="saddr">
        </div>
       <br>
        <div class="loginform">
        <label for="usern">Email:</label>    
        <input style="margin-left:-10px;" <?php echo (!empty($data['user'])) ? 'readonly' : ''; ?> type="email" name="deliveryEmail" value="<?php echo (!empty($data['user'])) ? strtoupper($data['user']->EMAIL) : ''; ?>">
        </div>
        <br>
        <div class="storeformrow">
            <div class="storeformcolumn">
                    <div class="loginform">
                <label for="usern">State: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
                <select name="deliveryState" id="state">
                    <option selected="selected" value="">Select here</option>
                    <option value='Abia'>Abia</option>
<option value='Adamawa'>Adamawa</option>
<option value='Akwa Ibom'>Akwa Ibom</option>
<option value='Anambra'>Anambra</option>
<option value='Bauchi'>Bauchi</option>
<option value='Bayelsa'>Bayelsa</option>
<option value='Benue'>Benue</option>
<option value='Borno'>Borno</option>
<option value='Cross River'>Cross River</option>
<option value='Delta'>Delta</option>
<option value='Ebonyi'>Ebonyi</option>
<option value='Edo'>Edo</option>
<option value='Ekiti'>Ekiti</option>
<option value='Enugu'>Enugu</option>
<option value='Gombe'>Gombe</option>
<option value='Imo'>Imo</option>
<option value='Jigawa'>Jigawa</option>
<option value='Kaduna'>Kaduna</option>
<option value='Kano'>Kano</option>
<option value='Katsina'>Katsina</option>
<option value='Kebbi'>Kebbi</option>
<option value='Kogi'>Kogi</option>
<option value='Kwara'>Kwara</option>
<option value='Lagos'>Lagos</option>
<option value='Nasarawa'>Nasarawa</option>
<option value='Niger'>Niger</option>
<option value='Ogun'>Ogun</option>
<option value='Ondo'>Ondo</option>
<option value='Osun'>Osun</option>
<option value='Oyo'>Oyo</option>
<option value='Plateau'>Plateau</option>
<option value='Rivers'>Rivers</option>
<option value='Sokoto'>Sokoto</option>
<option value='Taraba'>Taraba</option>
<option value='Yobe'>Yobe</option>
<option value='Zamfara'>Zamfara</option>
<option value='FCT'>FCT</option>
                </select>
                </div> 
            </div>            
            <div class="storeformcolumn" >
                    <div class="loginform" style="margin-right:2px;">
                <label for="usern">Mobile: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
                <input style="margin-left:-50px;" type="text" <?php echo (!empty($data['user'])) ? 'readonly' : ''; ?> name="deliveryMobile" value="<?php echo (!empty($data['user'])) ? strtoupper($data['user']->MOBILE_PHONE) : ''; ?>">
                </div>
            </div>
        </div>

</div>
        </div>

        <div id="pickupWindow" style='display:none;'>
        <div class="formrow">
        <div class="loginform">
            <label for="usern" style="width:300px;">Fullname of Pickup Person: <span style="color:#e23c3c; font-size:17px;">*</span></label>
        <input type="text" name="pickupFname" <?php echo (!empty($data['user'])) ? 'readonly' : ''; ?> value="<?php echo (!empty($data['user'])) ? strtoupper($data['user']->FIRST_NAME .' '.$data['user']->LAST_NAME) : ''; ?>">
        </div>
       <br>
        <div class="loginform">
        <label for="usern">Email:</label>    
        <input style="margin-left:70px;" <?php echo (!empty($data['user'])) ? 'readonly' : ''; ?> type="email" name="pickupEmail" value="<?php echo (!empty($data['user'])) ? strtoupper($data['user']->EMAIL) : ''; ?>" >
        </div>
        <br>
        <div class="storeformrow">
            <div class="storeformcolumn">
                    <div class="loginform">
                <label for="usern">Pickup State: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
                <select name="pickupState" id="pickupState">
                    <option selected="selected" value="">Select here</option>
                    <option value='Abia'>Abia</option>
<option value='Adamawa'>Adamawa</option>
<option value='Akwa Ibom'>Akwa Ibom</option>
<option value='Anambra'>Anambra</option>
<option value='Bauchi'>Bauchi</option>
<option value='Bayelsa'>Bayelsa</option>
<option value='Benue'>Benue</option>
<option value='Borno'>Borno</option>
<option value='Cross River'>Cross River</option>
<option value='Delta'>Delta</option>
<option value='Ebonyi'>Ebonyi</option>
<option value='Edo'>Edo</option>
<option value='Ekiti'>Ekiti</option>
<option value='Enugu'>Enugu</option>
<option value='Gombe'>Gombe</option>
<option value='Imo'>Imo</option>
<option value='Jigawa'>Jigawa</option>
<option value='Kaduna'>Kaduna</option>
<option value='Kano'>Kano</option>
<option value='Katsina'>Katsina</option>
<option value='Kebbi'>Kebbi</option>
<option value='Kogi'>Kogi</option>
<option value='Kwara'>Kwara</option>
<option value='Lagos'>Lagos</option>
<option value='Nasarawa'>Nasarawa</option>
<option value='Niger'>Niger</option>
<option value='Ogun'>Ogun</option>
<option value='Ondo'>Ondo</option>
<option value='Osun'>Osun</option>
<option value='Oyo'>Oyo</option>
<option value='Plateau'>Plateau</option>
<option value='Rivers'>Rivers</option>
<option value='Sokoto'>Sokoto</option>
<option value='Taraba'>Taraba</option>
<option value='Yobe'>Yobe</option>
<option value='Zamfara'>Zamfara</option>
<option value='FCT'>FCT</option>
                </select>
                </div> 
            </div>            
            <div class="storeformcolumn" >
                    <div class="loginform" style="margin-right:2px;">
                <label for="usern">Mobile: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
                <input style="margin-left:-50px;" <?php echo (!empty($data['user'])) ? 'readonly' : ''; ?> type="text" readonly="true" name="pickupMobile" value="<?php echo (!empty($data['user'])) ? strtoupper($data['user']->MOBILE_PHONE) : ''; ?>" >
                </div>
            </div>
        </div>        
        <div class="loginform">
        <label for="usern" style="width:300px;">Pickup Location Address:</label>    
        <select style="margin-left:-50px;" name="pickupLocation" id="pickupLocation">
            <option value="">SELECT NEAREST PICK-UP LOCATION HERE</option>
            <option value="002">PICK-UP LOCATION (01) - 38 JIMOH DAUDU STREET OFF OREGUN ROAD IKEJA LAGOS - CONTACT NUMBER [09053100351]</option>
            <option value="003">PICK-UP LOCATION (02) - 101 ALLEN AVENUE STREET OFF AWOLOWO ROAD IKEJA LAGOS - CONTACT NUMBER [08023429574]</option>
        </select>
        </div>

</div>
        </div>
    

            <!-- FORM ENDS -->

            </div>
            <br>
            <br>
            <br>
            <div class="reviewOrder">Review your order below</div>
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
            <div class="headercol">
                <div style="color:#404257;"><i class="fas fa-money-bill"></i> Payment Options</div> 
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
                <div>₦ <?php echo number_format($subTotal, 2); ?></div>
            </div>
            <div class="checkoutbtn">
                <?php if(isLoggedIn()) : ?>
                    <button style="background-color:#23bb44;">Continue to Payment <i class="fas fa-money-bill"></i></button>
                <?php endif; ?>
            </div>
            <div class="paymentinfo">
                <div><img src="<?php echo URLROOT; ?>/public/images/secured.png?v=<?php echo rand(10000000000,99999999999); ?>" /></div>
                <div><h6>Transactions are 100% safe and secure </h6></div>
            </div>
        </div>
    </div>

</div>

</form>


<!-- FOOTER -->
<?php
   require APPROOT . '/views/includes/footer.php';
?>