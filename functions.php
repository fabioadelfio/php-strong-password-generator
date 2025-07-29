<?php

function generatePassword($length, $useLowercase, $useUppercase, $useNumbers, $useSymbols)
{
    $characters = '';

    if ($useLowercase) {
        $characters .= 'abcdefghijklmnopqrstuvwxyz';
    }
    if ($useUppercase) {
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($useNumbers) {
        $characters .= '0123456789';
    }
    if ($useSymbols) {
        $characters .= '!@#$%^&*()-_=+[]{}|;:,.<>?';
    }

    if ($characters === '') {
        return 'Errore: Nessun set di caratteri selezionato.';
    }

    $password = '';
    $maxIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $maxIndex)];
    }

    return $password;
}
