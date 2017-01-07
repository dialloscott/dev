<?php
session_start();
function registerFlash()
{
    $flash = '';
    if (isset($_SESSION['flash']))
        $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}
function registerErrorForLogin()
{
    $flash = '';
    if (isset($_SESSION['errorLog']))
        $flash = $_SESSION['errorLog'];
    unset($_SESSION['errorLog']);
    return $flash;
}

if (!empty($_POST && $_POST['name'] !== '' && $_POST['password'] !== '')) {
   require 'db.php';
    extract($_POST);
    $q = $db->prepare('SELECT * FROM users WHERE name = :name');
    $q->execute(["name" => $name]);
    $res = $q->fetch();
    if($res && password_verify($password,$res['password'])){
       $_SESSION['id'] = $res['id'];
       $_SESSION['name'] = $res['name'];
       $_SESSION['email;'] = $res['email'];
       header('Location:profile.php');
        exit();
    }else{
        $_SESSION['errorLog'] = 'Idantifent ou Mot de pass Inccorect';
        header('Location:login.php');
        exit();
    }

}
require 'views/login.php';