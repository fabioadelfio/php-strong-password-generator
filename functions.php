<?php

function generatePassword($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}|;:,.<>?';
    $password = '';
    $maxIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $maxIndex)];
    }

    return $password;
}

// Recupero la lunghezza della password richiesta

$passwordLength = isset($_GET['length']) ? (int) $_GET['length'] : 0;
$generatedPassword = '';

if ($passwordLength > 0) {
    $generatedPassword = generatePassword($passwordLength);
}
