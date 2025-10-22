<?php

session_start();
if (!isset($_SESSION)) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Admin Page</title>
</head>
<body style="background: #fff;">

    <div class="box">

        <h1>Bem vindo, <span><?= $_SESSION["nome"]; ?></span></h1>
        <p>Está é a página de <span>admin</span></p>
        <button onclick="window.location.href='logout.php'">Logout</button>

    </div>
    
</body>
</html>