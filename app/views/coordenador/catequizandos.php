<?php

session_start();
// if (!isset($_SESSION["usuario_nome"])) {
//     header("Location: ../login.php");
//     exit();
// }

require_once __DIR__ . '/../../models/config.php'; // Caminho do config correto

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordenação | Catequizandos</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php' ?>

    <!-- Main -->
    <main class="flex-1 p-8 overflow-y-auto p-[20px]">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <h1 class="text-[32px] font-bold">Gerenciar Catequizandos</h1>

        <p class="text-[20px] mb-[20px]">Adicione, edite ou remova contas de catequizandos.</p>

        <input id="filtro" class="bg-[#fff] w-[500px] h-[40px] mb-[50px] rounded border-1 border-gray" type="text" placeholder="Pesquisar"> 

        <table class="border-1 border-black w-full" id="tabela-catequizandos">

            <thead>
                <tr class="border-1 border-black bg-[#fff]">
                    <th class="py-[10px] border-1 border-black">Nome</th>
                    <th class="py-[10px] border-1 border-black">Email</th>
                    <th class="py-[10px] border-1 border-black">Telefone</th>
                    <th class="py-[10px] border-1 border-black">Data de Nascimento</th>
                    <th class="py-[10px] border-1 border-black">Escola</th>
                    <th class="py-[10px] border-1 border-black">Paróquia de Origem</th>
                    <th class="py-[10px] border-1 border-black">Transferência</th>
                </tr>
            </thead>

            <tbody>
                <?php
                
                    if ($stmt->rowCount() > 0) {
                    $catequizandos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($catequizandos as $c) {
                ?>
                    <tr class="border-1 border-black bg-white">
                        <td class="p-[10px] border-1 border-black"><?= htmlspecialchars($c['nome']) ?></td>
                        <td class="p-[10px] border-1 border-black"><?= htmlspecialchars($c['email']) ?></td>
                        <td class="p-[10px] border-1 border-black"><?= htmlspecialchars($c['telefone']) ?></td>
                        <td class="p-[10px] border-1 border-black"><?= htmlspecialchars($c['data_nascimento']) ?></td>
                        <td class="p-[10px] border-1 border-black"><?= htmlspecialchars($c['escola']) ?></td>
                        <td class="p-[10px] border-1 border-black"><?= htmlspecialchars($c['paroquia_origem']) ?></td>
                        <td class="p-[10px] border-1 border-black"><?= htmlspecialchars($c['transferencia']) ?></td>
                    </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center p-3 bg-white border border-black'>Nenhum catequizando encontrado.</td></tr>";
                    }

                ?>
            </tbody>
        </table>

    </main>

    <script>
        document.getElementById('filtro').addEventListener('input', function () {
            const valorFiltro = this.value.toLowerCase();
            const linhas = document.querySelectorAll('#tabela-catequizandos tbody tr');

            linhas.forEach(function(linha) {
                const textoLinha = linha.textContent.toLowerCase();
                linha.style.display = textoLinha.includes(valorFiltro) ? '' : 'none';
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');
            if (menuToggle) {
                menuToggle.addEventListener('click', () => {
                    sidebar.classList.add('translate-x-0');
                });
            }
            if (menuClose) {
                menuClose.addEventListener('click', () => {
                    sidebar.classList.remove('translate-x-0');
                });
            }
        });
    </script>
    
</body>
</html>