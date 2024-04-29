<?php

function is_valid_dni($dni){

    if (isset($dni)){
        $letter = substr($dni, -1);
        $numbers = substr($dni, 0, -1);
        
        if (strlen ($numbers) == 8 && strlen($letter) == 1){
            try{
                if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter){
                    return true;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        } 
    }
    return false;
}

function is_valid_phone($phone) {

    if (isset($phone)){
        $pattern = '/^\d{9}$/'; // pattern 9 numeric digits
    
        if (preg_match($pattern, $phone)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}