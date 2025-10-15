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
                    <a class="flex items-center gap-[10px] p-[10px]" href="catequistas.php">
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
                    <a class="flex items-center gap-[10px] p-[10px]" href="#">
                        <i class="material-icons">wallpaper</i>
                        Relatórios
                    </a>
                </li>

            </ul>

        </nav>

        <div class="pb-[15px] mb-[15px] mx-auto border-b border-black">

        <p class="pl-[25px] uppercase">Ações rápidas</p>

        <div class="flex flex-col items-center">

            <a class="flex justify-center gap-[10px] bg-[#008000] text-[#fff] w-[250px] py-[7px] mb-[15px] rounded-[7px] text-center" href="#">
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

    <!-- Main -->
    <main class="p-[10px]">

        <h1 class="text-[32px] font-bold">Gerenciar Catequistas</h1>

        <p class="text-[20px] mb-[20px]">Adicione, edite ou remova contas de catequistas.</p>

        <input class="bg-[#fff] w-[500px] h-[40px] mb-[50px] rounded border-1 border-gray" type="text" placeholder="Pesquisar">

        <table class="border-1 border-black">

            <tr class="border-1 border-black">

                <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Nome</th>
                <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Email</th>
                <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Status</th>
                <th class="w-[300px] py-[10px] bg-[#fff] border-1 border-black">Etapa</th>

            </tr>

            <tr class="border-1 border-black">

                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Nome</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Email</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Status</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Etapa</td>

            </tr>

            <tr class="border-1 border-black">

                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Nome</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Email</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Status</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Etapa</td>

            </tr>

            <tr class="border-1 border-black">

                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Nome</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Email</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Status</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Etapa</td>

            </tr>

            <tr class="border-1 border-black">

                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Nome</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Email</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Status</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Etapa</td>

            </tr>

            <tr class="border-1 border-black">

                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Nome</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Email</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Status</td>
                <td class="w-[300px] p-[10px] bg-[#fff] border-1 border-black">Etapa</td>

            </tr>


        </table>

    </main>
    
</body>
</html>