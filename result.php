<?php

session_start();

if (!isset($_SESSION['generated_password'])) {
    // Se la password non è presente, torna alla homepage
    header("Location: index.php");
    exit;
}

$password = $_SESSION['generated_password'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Result</title>
</head>

<body>
    <div class="container text-center password my-5">
        <h1 class="password fw-bold my-5"><?php echo $password; ?></h1>
        <a class="fs-3 link-offset-2 link-underline link-underline-opacity-0" href="index.php">Genera un'altra Password</a>
    </div>
</body>

</html>