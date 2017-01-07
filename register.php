<?php
session_start();
if (!empty($_POST)) {
    extract($_POST);
    $errors = [];
    if (strlen($name) < 4) {
        $errors = 'Le nom doit conternir au moyen (4 caractere munimum)!';
    } elseif (strlen($email) < 4 && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = 'Votre adress email n est pas valid!';
    } elseif (strlen($password) < 4 || $password !== $password_confirm) {
        $errors = 'Les deux mot de pass n est concoredent pas!';
    }
    if (empty($errors)) {
        require 'db.php';
        $query =  $db->prepare("INSERT INTO users(name,email,password)
                         VALUES(:name,:email,:password) ");
        $query->execute([
            "name" => $name,"email" => $email,"password" => password_hash($password,PASSWORD_BCRYPT)
        ]);
        $token = md5($name . "+" . $email);
        $to = $email;
        $subject =   "http://localhost - ACTIVATION DE COMPTE";
        ob_start();
        require 'mail/activation.tmpl.php';
        $content = ob_get_clean();
        $headers = "MIME-VERSION : 1.0 \r\n";
        $herders = "Content-type: text/html; charset=iso-8859-1\r\n";
        mail($to, $subject, $content, $herders);
        $_SESSION['success'] = 'Un email de confirmation a bien ete envoyer sur votre email!';
        header('Location:index.php');
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header('Location:index.php');
        exit();
    }
}



