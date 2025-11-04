<?php

session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ../login.php");
    exit();
}   

require_once '../config.php'; // ajuste o caminho conforme a estrutura do seu projeto

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordenação | Perfil</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

        .modal {
            background-color: rgba(0, 0, 0, 0.3);
            opacity: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transition: all 0.3s ease-in-out;
            z-index: -1;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal.open {
            opacity: 1;
            z-index: 999;
        }

        .modal-inner {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
            padding: 15px 25px;
            text-align: center;
            width: 380px;
        }

        .modal-inner h2 {
            margin: 0;
        }

        .modal-inner p {
            line-height: 24px;
            margin: 10px 0;
        }

    </style>
    
</head>
<body class="flex bg-[#E5ECFF]">

    <?php require_once 'sidebar.php' ?>

    <!-- Main -->
    <main class="p-[20px]">

        <h1 class="text-[32px] font-bold mb-[20px]">Perfil</h1>

        <form class="flex flex-col" action="#">

            <div class="bg-[#fff] border-1 w-[200px] h-[200px] rounded-[50%] mb-[50px]"></div>

            <label class="text-[20px] font-bold" for="nome">Nome completo</label>
            <input class="bg-[#fff] w-[500px] h-[40px] mb-[50px] rounded border-1 border-gray" type="text" value="<?= $_SESSION['nome'] ?>">

            <a class="flex items-center gap-[20px] bg-[#1E64F0] text-[#fff] w-[250px] py-[10px] px-[10px] mb-[20px] rounded-[5px]" href="novaturma.php">
                <i class="material-icons">check_circle</i>
                Salvar alterações
            </a>

        </form>

        <!-- popup -->

        <button class="flex items-center gap-[20px] bg-[#D92626] text-[#fff] w-[250px] py-[10px] px-[10px] mb-[20px] rounded-[5px]" id="openModal">
            <i class="material-icons">cancel</i>
            Fazer Logout
        </button>

        <div class="modal" id="modal">
            <div class="modal-inner">
                <h2 class="text-[24px] font-bold">Logout</h2>
                <p>Tem certeza que deseja sair?</p>
                <div class="flex justify-between">
                    <button class="flex justify-center items-center gap-[20px] bg-[#DDDDDD] text-[#000] text-center w-[150px] py-[10px] px-[10px] mb-[20px] rounded-[5px]" id="closeModal">Cancelar</button>
                    <a class="flex justify-center items-center gap-[20px] bg-[#D92626] text-[#fff] text-center w-[150px] py-[10px] px-[10px] mb-[20px] rounded-[5px]" onclick="window.location.href='../logout.php'">Sim</a>
                </div>
            </div>
        </div>

    </main>

    <script>

        const openBtn = document.getElementById("openModal");
        const closeBtn = document.getElementById("closeModal");
        const modal = document.getElementById("modal");

        openBtn.addEventListener("click", () => {
        modal.classList.add("open");
        });

        closeBtn.addEventListener("click", () => {
        modal.classList.remove("open");
        });

    </script>
    
</body>
</html>