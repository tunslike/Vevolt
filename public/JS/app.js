// JS Controller Vevolt
// 2021 August 8

function validateLoginForm(){
    var usern = $('#usern').val()
    var entry = $('#entry').val()

    if(usern.trim() == '' || entry.trim() == ''){
        $('#ermsg').html('Enter your email address and password!')
        $('.errorMsgBox').show()
        return false;
    }
}

function switchDeliveryOption() {
    if($('#deladdr').is(":checked")){

        $('#pickupWindow').hide()
        $('#deliveryWindow').show()

    }else if($('#delloc').is(":checked")){

        $('#deliveryWindow').hide()
        $('#pickupWindow').show()
    }
}

function validateCreateStrore() {

    var sname = $('#sname').val() 
    var saddr = $('#saddr').val()
    var cat = $('#cat').val()
    var mobile = $('#mobile').val()
    var state = $('#state').val()

    if(sname.trim() == '' || saddr.trim() == '' || cat.trim() == '' || mobile.trim() == '' || state.trim() == ''){
        $('#ermsg').html('All fields are complusory!')
        $('.errorMsgBox').show()
        return false;
    }
}

function ValidateQuantityField(count) {
    if(count.trim() == '') {

        $('.qtyval').val('1');

    }else if(count.trim() == '0') {

        $('.qtyval').val('1');

    }
}

function showCatHint(id) {

    $('#hintInfo').hide()

    switch (id) {
        case '1':
            $('#infomsg').html('This indicates that you are specialized in the sales of all Master Spare Parts');
            $('#hintInfo').show()
            break;
        case '2':
            $('#infomsg').html('This indicates that you are specialized in the sales of Generator Parts/Sets');
            $('#hintInfo').show()
            break;
        case '3':
            $('#infomsg').html('This indicates that you are specialized in the sales of Engine Oil/Service Kit');
            $('#hintInfo').show()
            break;
        case '4':
            $('#infomsg').html('This indicates that you are specialized in the sales of General Service Parts');
            $('#hintInfo').show()
            break;
    }
}

function validationRegistrationForm() {

    var lname = $('#lname').val() 
    var fname = $('#fname').val()
    var email = $('#email').val()
    var mobile = $('#mobile').val()

    if(lname.trim() == '' || fname.trim() == '' || email.trim() == '' || mobile.trim() == ''){
        $('#ermsg').html('All fields are complusory!')
        $('.errorMsgBox').show()
        return false;
    }

    alert('it is valid now')

    if(mobile.length < 8) {
        $('#ermsg').html('Mobile number not complete!')
        $('.errorMsgBox').show()
        return false;
    }

    if(checkEmail(email) == false){
        $('#ermsg').html('Invaid email address!')
        $('.errorMsgBox').show()
        return false;
    }
}

// Validates email address of course.
function checkEmail(email) {

    alert('you are here in validate email')

    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        return false;
    }
}

function checkNumber(evt) {
    var theEvent = evt || window.event;
  
    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }