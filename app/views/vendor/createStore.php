<?php
   require APPROOT . '/views/includes/header.php';
?>
<div class="innerheader">
<div class="innerHeaderTitle">
    Create New Store
</div>
</div>

<div class="innerBodyContainer">

<?php if(!isset($_SESSION['firstname'])) : ?>
<div class="infoMsgBox" style="display:block;">
    <i class="fas fa-info-circle" style="margin-right:5px; font-size:16px;"></i> Sorry, you are not logged in. Please login to proceed
</div>
<?php endif; ?>

<h5 class="logintitleheader"><i style="margin-right:10px; font-size:17px;" class="fas fa-store"></i> Provide the information below to create a new store</h5>

<?php if(isset($_SESSION['firstname'])) : ?>

<div class="storeowner">
<i class="fas fa-user" style="margin-right:5x;"></i> Store Owner: <?php echo ucfirst($_SESSION['firstname']); ?>
</div>

<?php endif; ?>

<div class="errorMsgBox">
    <i class="fas fa-times" style="margin-right:5px; font-size:16px;"></i> Error: <span id="ermsg"></span>
</div>

<?php if($data['status'] == 'true') : ?>
        <div class="successMsgBox">
        <i class="fas fa-check" style="margin-right:5px; font-size:16px;"></i> Your store was created successfully. Please see your dashboard to manage your store
        </div>
    <?php endif; ?>

<form action="<?php echo URLROOT; ?>/vendors/createStore" onsubmit="return validateCreateStrore();" method ="POST">

<div class="formrow">
        <div class="loginform">
            <label for="usern">Store Name: <span style="color:#e23c3c; font-size:17px;">*</span></label>
        <input type="text" name="sname" id="sname">
        </div>
        <div class="loginform">
        <label for="usern">Store Address: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
        <input type="text" name="saddr" id="saddr">
        </div>
       <br>
       <div class="hintBox" id="hintInfo">
       <i class="fas fa-info-circle" style="margin-right:5px; font-size:17px; text-align:left;"></i> <span id="infomsg">this is information</span>
       </div>
        <div class="storeformrow">
            <div class="storeformcolumn">
                    <div class="loginform">
                <label for="usern">Category: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
                <select style="margin-left:-50px;" name="cat" onChange="showCatHint(this.value); return false;" id="cat">
                    <option selected="selected" value="">Select here</option>
                    <option value="1">Master Spare Parts</option>
                    <option value="2">Generator Parts/Sets</option>
                    <option value="3">Engine Oil/Service Kit</option>
                    <option value="4">General Service Parts</option>
                </select>
                </div> 
            </div>            
            <div class="storeformcolumn" >
                    <div class="loginform" style="margin-right:2px;">
                <label for="usern">Mobile: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
                <input style="margin-left:-50px;" type="text" name="mobile" id="mobile">
                </div>
            </div>
        </div>
        <div class="loginform" style="margin-top:-12px;">
        <label for="usern">Email:</label>    
        <input style="margin-left:-50px;" type="email" name="email" id="email">
        </div>
           <div class="storeformrow">
            <div class="storeformcolumn">
                    <div class="loginform">
                <label for="usern">State: <span style="color:#e23c3c; font-size:17px;">*</span></label>    
                <select name="state" id="state">
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
                <label for="usern">Store ID:</label>    
                <input style="margin-left:-50px;" type="text" name="storeid" id="storeid">
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION['firstname'])) : ?>

        <div style="text-align:center; margin-top:40px">
    <button class="regbutton" style="background-color:#e23c3c; margin-top:-20px;">Create Store</button>
    </div>
    <?php endif; ?>

</div>

</form>



</div>


<?php
   require APPROOT . '/views/includes/footer.php';
?>