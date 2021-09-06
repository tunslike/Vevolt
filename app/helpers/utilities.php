<?php
    
    function getUniqueUserID(){
        return $guid = bin2hex(openssl_random_pseudo_bytes(16));
    }

    function convertImageToBlob($file) {

        if(file_exists($file)){
            return file_get_contents($file);
        }else{
            return 'false';
        }
    }

    function addLeadingZero($value){
        return str_pad($value, '5', '0', STR_PAD_LEFT);
    }

    function setCartCookie ($cookieName, $cookieValue) {        
        setcookie($cookieName, $cookieValue, time() + 3600, '/' ); // set cookie for 1 hour
    }

    function retrieveCartCookie () {
        return $_COOKIE["cartItem"];
    }