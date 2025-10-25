<?php

session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ../login.php");
    exit();
}   

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordenação | Comunicados</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body class="flex bg-[#E5ECFF]">

    <?php require_once 'sidebar.php' ?>

    <main class="p-[20px]">

        <h1 class="text-[32px] font-bold">Enviar Comunicados</h1>
        <p class="mb-[50px]">Envie Mensagens e avisos importantes para grupos especificos ou para toda comunidade.</p>

        <form class="flex flex-col" action="#">

            <label class="text-[18px]" for="titulo">Título</label>
            <input class="bg-[#fff] border-1 px-[10px] py-[7px] mb-[30px]" name="titulo" id="titulo" type="text">

            <label class="text-[18px]" for="mensagem">Mensagem</label>
            <textarea class="bg-[#fff] border-1 px-[10px] py-[7px] mb-[30px]" name="mensagem" id="mensagem" rows="7"></textarea>

            <label class="text-[18px]" for="titulo">Selecionar destinatários</label>
            <div class="bg-[#fff] p-[10px] mb-[30px] border-1">

                <input type="checkbox" id="catequizandos" name="catequizandos" value="Catequizandos">
                <label for="catequizandos">Catequizandos</label><br>
                <input type="checkbox" id="catequistas" name="catequistas" value="Catequistas">
                <label for="catequistas">Catequistas</label><br>
                <input type="checkbox" id="responsaveis" name="responsaveis" value="Responsaveis">
                <label for="responsaveis">Responsáveis</label><br>

            </div>

            <button class="flex items-center gap-[20px] bg-[#1E64F0] text-[#fff] w-[250px] py-[10px] px-[10px] rounded-[5px]" type="submit" href="comunicados.php">
                <i class="material-icons">message</i>
                Enviar Comunicado Geral
            </button>

        </form>

    </main>
    
</body>
</html>