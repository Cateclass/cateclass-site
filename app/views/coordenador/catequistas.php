<?php

session_start();
// if (!isset($_SESSION["usuario_nome"])) {
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
    <title>Coordenação | Catequistas</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="flex bg-[#E5ECFF]">
    <?php require_once 'sidebar.php'; ?>

    <!-- Conteúdo principal -->
    <main class="p-[20px] w-full">
        <h1 class="text-[32px] font-bold">Gerenciar Catequistas</h1>
        <p class="text-[20px] mb-[20px]">Adicione, edite ou remova contas de catequistas.</p>

        <input id="filtro" type="text" placeholder="Pesquisar" 
            class="bg-[#fff] w-[500px] h-[40px] mb-[50px] rounded border border-1 px-2">

        <table class="border border-black bg-white w-full" id="tabela-catequistas">
            <thead>
                <tr class="border border-black">
                    <th class="py-2 px-3 border border-black">Nome</th>
                    <th class="py-2 px-3 border border-black">E-mail</th>
                    <th class="py-2 px-3 border border-black">Telefone</th>
                    <th class="py-2 px-3 border border-black">Endereço</th>
                    <th class="py-2 px-3 border border-black">Criado em</th>
                </tr>
            </thead>

            <tbody>
                <?php                    

                    if ($stmt->rowCount() > 0) {
                        $catequistas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($catequistas as $catequista) {
                            echo "<tr class='border border-black'>
                                    <td class='p-2 border border-black'>{$catequista['nome']}</td>
                                    <td class='p-2 border border-black'>{$catequista['email']}</td>
                                    <td class='p-2 border border-black'>{$catequista['telefone']}</td>
                                    <td class='p-2 border border-black'>{$catequista['endereco']}</td>
                                    <td class='p-2 border border-black'>" . date('d/m/Y H:i', strtotime($catequista['criado_em'])) . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='p-3 text-center'>Nenhum catequista encontrado.</td></tr>";
                    }
                    
                ?>
            </tbody>
        </table>
    </main>

    <script>
    document.getElementById('filtro').addEventListener('input', function () {
        const valorFiltro = this.value.toLowerCase();
        const linhas = document.querySelectorAll('#tabela-catequistas tbody tr');

        linhas.forEach(function(linha) {
            const texto = linha.textContent.toLowerCase();
            linha.style.display = texto.includes(valorFiltro) ? '' : 'none';
        });
    });
    </script>
</body>
</html>
