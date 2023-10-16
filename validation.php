<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!isset($username)
    || !isset($email)
    || !isset($password)
    || empty($username)
    || empty($email) 
    || empty($password)
) {
    $error = 'Erreur : Formulaire incomplet !';
}

if (!isEmailAvailable($db, $email)) {
    $error = 'Erreur : Email indisponible';
}

if (!isUsernameAvailable($db, $username)) {
    $error = 'Erreur : Usernanme indisponible';
}

if (isset($error)) {
    $_SESSION['message'] = $error;
    header('Location: register.php');
}

userRegistration($db, $username, $email, $password);