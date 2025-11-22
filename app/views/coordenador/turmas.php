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
    <title>Coordenação | Turmas</title>

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

        <h1 class="text-[32px] font-bold">Gerenciar Turmas</h1>

        <p class="text-[20px] mb-[20px]">Adicione, edite ou remova turmas.</p>

        <input class="bg-[#fff] w-[500px] h-[40px] mb-[50px] rounded border-1 border-gray" 
               type="text" placeholder="Pesquisar" id="filtro">

        <table class="border-1 border-black w-full" id="tabela-turmas">

            <thead>
                <tr class="border-1 border-black text-left">
                    <th class="py-[10px] px-[10px] bg-[#fff] border-1 border-black">Nome da Turma</th>
                    <th class="py-[10px] px-[10px] bg-[#fff] border-1 border-black">Tipo</th>
                    <th class="py-[10px] px-[10px] bg-[#fff] border-1 border-black">Data de Início</th>
                    <th class="py-[10px] px-[10px] bg-[#fff] border-1 border-black">Data de Término</th>
                    <th class="py-[10px] px-[10px] bg-[#fff] border-1 border-black">Etapa</th>
                </tr>
            </thead>

            <tbody>
                <?php

                    if ($stmt->rowCount() > 0) {
                        $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($turmas as $turma) {
                            echo "
                                <tr class='border-1 border-black'>
                                    <td class='p-[10px] bg-[#fff] border-1 border-black'>{$turma['nome_turma']}</td>
                                    <td class='p-[10px] bg-[#fff] border-1 border-black'>{$turma['tipo_turma']}</td>
                                    <td class='p-[10px] bg-[#fff] border-1 border-black'>" . date('d/m/Y', strtotime($turma['data_inicio'])) . "</td>
                                    <td class='p-[10px] bg-[#fff] border-1 border-black'>" . 
                                        ($turma['data_termino'] ? date('d/m/Y', strtotime($turma['data_termino'])) : '—') . 
                                    "</td>
                                    <td class='p-[10px] bg-[#fff] border-1 border-black'>{$turma['nome_etapa']}</td>
                                </tr>
                            ";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='p-[10px] text-center bg-[#fff]'>Nenhuma turma encontrada.</td></tr>";
                    }
                ?>
            </tbody>

        </table>

    </main>

    <script>
        document.getElementById('filtro').addEventListener('input', function () {
            const valorFiltro = this.value.toLowerCase();
            const linhas = document.querySelectorAll('#tabela-turmas tbody tr');

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
