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
    <title>Coordenação | Dashboard</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body class="flex bg-[#E5ECFF]">

    <!-- Sidebar -->
    <aside class="bg-[#fff] w-[300px] h-[100vh]">

        <!-- "header" -->
        <div class="flex items-center gap-[10px] py-[15px] mb-[30px] border-b-1 border-black">
            <img class="w-[100px] rounded-[50%]" src="../assets/img/logotipo.jpg" alt="">
            
            <div>
                <p>CateClass</p>
                <span class="text-[#4A9FFF]">Plataforma Educacional</span>
            </div>
        </div>

        <!-- Links de navegação -->
        <nav class="mb-[30px]">

            <ul class="list-none">

                <li>
                    <a class="flex items-center gap-[10px] p-[10px]" href="dashboard.php">
                        <i class="material-icons">home</i>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-[10px] p-[10px]" href="#">
                        <i class="material-icons">people</i>
                        Turmas
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-[10px] p-[10px]" href="#">
                        <i class="material-icons">wallpaper</i>
                        Catequistas
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-[10px] p-[10px]" href="catequizandos.php">
                        <i class="material-icons">wallpaper</i>
                        Catequizandos
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-[10px] p-[10px]" href="#">
                        <i class="material-icons">wallpaper</i>
                        1ª Eucaristia
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-[10px] p-[10px]" href="comunicados.php">
                        <i class="material-icons">message</i>
                        Comunicados
                    </a>
                </li>

            </ul>

        </nav>

        <div class="pb-[15px] mb-[15px] mx-auto border-b border-black">

        <p class="pl-[25px] uppercase">Ações rápidas</p>

        <div class="flex flex-col items-center">

            <a class="flex justify-center gap-[10px] bg-[#008000] text-[#fff] w-[250px] py-[7px] mb-[15px] rounded-[7px] text-center" href="novaturma.php">
                <i class='fa fa-plus-circle' style='font-size:24px'></i>
                Nova Turma
            </a>

            <a class="flex justify-center gap-[10px] bg-[#D4F3E6] text-[#40B568] w-[250px] py-[7px] rounded-[7px] text-center" href="#">
                <i class="fa fa-bell" style='font-size:24px'></i>
                3 Novas Atividades
            </a>            

        </div>            

        </div>

        <div class="flex justify-center">

            <a class="flex items-center gap-[10px] bg-[#BEDDF5] text-[#fff] w-[250px] py-[7px] pl-[10px] mt-[15px] rounded-[7px] text-center" href="#">
                <div class="flex justify-center items-center w-[40px] h-[40px] rounded-[50%] bg-[#4A9FFF]">
                    U
                </div>
                <div class="flex flex-col items-start">
                    <span class="text-black">Usuário</span>
                    <span class="text-[#4A9FFF]">Catequista</span>
                </div>
            </a>

        </div>       

    </aside>

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