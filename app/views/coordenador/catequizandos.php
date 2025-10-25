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
<body class="flex bg-[#E5ECFF]">

    <?php require_once 'sidebar.php' ?>

    <!-- Main -->
    <main class="p-[20px]">

        <h1 class="text-[32px] font-bold">Gerenciar Catequizandos</h1>

        <p class="text-[20px] mb-[20px]">Adicione, edite ou remova contas de catequizandos.</p>

        <input class="bg-[#fff] w-[500px] h-[40px] mb-[50px] rounded border-1 border-gray" type="text" placeholder="Pesquisar">

        <table class="border-1 border-black">

            <tr class="border-1 border-black">

                <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Nome</th>
                <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Etapa</th>
                <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Ações</th>

            </tr>

            <tr class="border-1 border-black">

                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Nome</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Etapa</td>
                <td class="flex w-[300px] p-[10px] bg-[#fff]">
                    <a class="flex justify-center items-center w-[25px] h-[25px] rounded-[50%] border-1 border-blue text-white bg-[#0000ff]" href="#">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a class="flex justify-center items-center w-[25px] h-[25px] rounded-[50%] border-1 border-blue text-white bg-[#ff0000]" href="#">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="#">F</a>
                </td>

            </tr>

        </table>

    </main>
    
</body>
</html>