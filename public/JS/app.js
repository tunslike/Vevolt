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

function validationRegistrationForm(){

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