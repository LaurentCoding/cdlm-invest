<?php

// hachage MDP
function hachage_password(string $pass)
{
    $pass = "a2t" . sha1($pass . "1t23ed") . "v2v3d";
    $pass = sha1($pass);
    return $pass;
}
// Sécuriser les informations reçu
function data_secure(string $data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//vérification email
function verification_mail($mail)
{
    return filter_var($mail, FILTER_VALIDATE_EMAIL);
}

// vérification connecter
function is_connected()
{
    return isset($_SESSION['connect']);
}

function render(string $url, string $page){
    $_SESSION['page'] = $page;
    return header("location: ".URL."".$url);
}