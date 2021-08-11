<?php
    
    function getUniqueUserID(){
        return $guid = bin2hex(openssl_random_pseudo_bytes(16));
    }
