<?php
session_start();

function generateCsrfToken(){
    $csrf_token = md5(uniqid(rand(),true));
    $_SESSION['csrf_token'] = $csrf_token;
}
function checkCsrfToken($token,$sessionToken){
    if($token == $sessionToken){
        return true;
    }else{
        return false;
    }
}
?>