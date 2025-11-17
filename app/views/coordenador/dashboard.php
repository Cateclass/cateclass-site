<?php

session_start();
// if (!isset($_SESSION["email"])) {
//     header("Location: ../login.php");
//     exit();
// }   

require_once __DIR__ . '/../../models/config.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordenação | Dashboard</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body class="flex bg-[#E5ECFF]">

    <?php require_once 'sidebar.php' ?>

    <main class="p-[20px]">

        <h1 class="text-[32px] font-bold">Dashboard</h1>
        <p class="mb-[50px]">Bem-Vindo(a) <?= $_SESSION["usuario_nome"]; ?>. Aqui está o resumo das suas atividades da catequese.</p>

        <div class="mb-[50px]">

            <h2 class="text-[24px] font-bold mb-[20px]">Visão geral</h2>

            <div class="flex gap-[50px]">
                <div class="flex flex-col justify-center items-center bg-[#fff] w-[200px] h-[200px] p-[10px] rounded-[10px]">
                    <p class="text-[17px]">Total de Turmas</p>
                    <p class="text-[24px] text-[#62449D]"><?= $turmas[0]["COUNT(*)"]; ?></p>
                </div>
                <div class="flex flex-col justify-center items-center bg-[#fff] w-[200px] h-[200px] p-[10px] rounded-[10px]">
                    <p class="text-[17px]">Total de Catequistas</p>
                    <p class="text-[24px] text-[#008000]"><?= $catequistas[0]["COUNT(*)"]; ?></p>
                </div>
                <div class="flex flex-col justify-center items-center bg-[#fff] w-[200px] h-[200px] p-[10px] rounded-[10px]">
                    <p class="text-[17px]">Total de Catequizandos</p>
                    <p class="text-[24px] text-[#1E64F0]"><?= $catequizandos[0]["COUNT(*)"]; ?></p>
                </div>
            </div> 

        </div>

    </main>
    
</body>
</html>