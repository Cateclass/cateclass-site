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
<body class="bg-[#E5ECFF]">

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

                <div class="flex items-center gap-[10px] p-[10px]">
                    <i class="material-icons">home</i>
                    <li><a href="#">Dashboard</a></li>
                </div>

                <div class="flex items-center gap-[10px] p-[10px]">
                    <i class="material-icons">people</i>
                    <li><a href="#">Turmas</a></li>
                </div>

                <div class="flex items-center gap-[10px] p-[10px]">
                    <i class="material-icons">wallpaper</i>
                    <li><a href="#">Catequistas</a></li>
                </div>

                <div class="flex items-center gap-[10px] p-[10px]">
                    <i class="material-icons">wallpaper</i>
                    <li><a href="#">Crismandos</a></li>
                </div>

                <div class="flex items-center gap-[10px] p-[10px]">
                    <i class="material-icons">wallpaper</i>
                    <li><a href="#">1ª Eucaristia</a></li>
                </div>

                <div class="flex items-center gap-[10px] p-[10px]">
                    <i class="material-icons">wallpaper</i>
                    <li><a href="#">Relatórios</a></li>
                </div>

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
    
</body>
</html>