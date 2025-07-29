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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>PSW Generator</title>
</head>

<body>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="text-center my-3">Password Generator</h1>
        <form method="GET">
            <div class="form-group text-center">
                <label class="fs-4">Password Length</label>
                <br>
                <input type="number" name="length" id="length" class="form-control text-center mb-3" min="4" max="20" placeholder="4 - 20" required>
                <button type="submit" class="btn btn-success fs-4">Generate Password</button>
            </div>
        </form>
    </div>
    <div class="container text-center password my-5">
        <h1>
            <?php
            if ($generatedPassword) {
                echo 'Generated Password: <strong>' . $generatedPassword . '</strong>';
            }
            ?>
        </h1>
    </div>
</body>

</html>