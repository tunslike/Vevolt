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