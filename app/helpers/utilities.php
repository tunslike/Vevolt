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