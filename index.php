<?php
session_start();

function registerError(){
    $error = '';
    if(isset($_SESSION['errors'])){
        $error = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
    return $error;
}

function registerSuccess(){
    $success = '';
    if(isset($_SESSION['success'])){
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    return  $success;
}

require 'views/index.view.php';