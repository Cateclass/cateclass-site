<?php
require_once '../config.php'; // ajuste o caminho conforme a estrutura do seu projeto
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordenação | Catequistas</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body class="flex bg-[#E5ECFF]">

    <?php require_once 'sidebar.php' ?>

    <!-- Main -->
    <main class="p-[20px]">

        <h1 class="text-[32px] font-bold">Gerenciar Catequistas</h1>

        <p class="text-[20px] mb-[20px]">Adicione, edite ou remova contas de catequistas.</p>

        <input class="bg-[#fff] w-[500px] h-[40px] mb-[50px] rounded border-1 border-gray" type="text" placeholder="Pesquisar">

        <table class="border-1 border-black">

            <thead>

                <tr class="border-1 border-black">

                    <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Nome</th>
                    <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Email</th>
                    <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Funções</th>

                </tr>

            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM catequistas";

                // Prepara e executa a consulta
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Verifica se retornou algum resultado
                if ($stmt->rowCount() > 0) {
                    // Pega todos os registros em um array associativo
                    $catequistas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Loop para exibir cada usuário
                    foreach ($catequistas as $catequista) {
                ?>
                        <tr class="border-1 border-black">
                            <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black"><?= $catequista['nome'] ?></td>
                            <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black"><?= $catequista['email'] ?></td>
                            <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black"><?= $catequista['funcao'] ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum catequista encontrado.</td></tr>";
                }
                ?>

            </tbody>

        </table>

    </main>
    
</body>
</html>