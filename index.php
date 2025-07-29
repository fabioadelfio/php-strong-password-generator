<?php
session_start();

require_once __DIR__ . '/functions.php';

// Recupero della lunghezza richiesta dalla query string
$passwordLength = isset($_GET['length']) ? (int) $_GET['length'] : 0;
$generatedPassword = '';

$useLowercase = isset($_GET['lowercase']);
$useUppercase = isset($_GET['uppercase']);
$useNumbers = isset($_GET['numbers']);
$useSymbols = isset($_GET['symbols']);

if ($passwordLength > 0) {
    $generatedPassword = generatePassword(
        $passwordLength,
        $useLowercase,
        $useUppercase,
        $useNumbers,
        $useSymbols
    );

    $_SESSION['generated_password'] = $generatedPassword;

    header("Location: result.php");
    exit;
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
        <h1 class="text-center my-3">Strong Password Generator</h1>
        <form method="GET">
            <div class="form-group text-center">
                <label class="fs-4">Lunghezza Password</label>
                <br>
                <input type="number" name="length" id="length" class="form-control text-center mb-3" min="4" max="20" placeholder="4 - 20" required>
                <label><input type="checkbox" name="lowercase" checked> Lettere minuscole</label><br>
                <label><input type="checkbox" name="uppercase" checked> Lettere maiuscole</label><br>
                <label><input type="checkbox" name="numbers" checked> Numeri</label><br>
                <label><input type="checkbox" name="symbols" checked> Simboli</label><br>
                <button type="submit" class="btn btn-success fs-4">Genera Password</button>
            </div>
        </form>
    </div>
    <div class="container text-center password my-5">
        <div class="fs-3">
            <?php
            if ($generatedPassword) {
                echo 'Generated Password:<h1 class="fw-bold">' . $generatedPassword . '</h1>';
            }
            ?>
        </div>
    </div>
</body>

</html>