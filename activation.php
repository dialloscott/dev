<?php
if (!empty($_GET['token']) && !empty($_GET['name'])) {
    require 'db.php';
    extract($_GET);
    $q = $db->prepare("SELECT * FROM users WHERE name = ? ");
    $q->execute([$name]);
    $res = $q->fetch();
    if ($res && $token === md5($res['name'] . "+" . $res['email'])) {
        $q = $db->prepare("UPDATE users SET  active = '1', created_at = NOW() WHERE name = :name");
        $q->execute(["name" => $name]);
        session_start();
        $_SESSION['flash'] = 'Votre compt a bien ete acctive mercie!';
        header('Location:login.php');
        exit();
    }
} else {
    header('Location:login.php');
    exit();

}
