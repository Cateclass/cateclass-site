<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts - Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Início | Escolink</title>

</head>

<body>

    <!-- Header -->
    <header class="w-screen h-[64px] bg-[#022E51] text-white">

        <!-- Navbar -->
        <nav class="flex justify-around items-center gap-x-[50px] w-screen">

            <!-- Logo -->
            <a class="flex items-center gap-[10px]" href="./">
                <img class="w-[64px] h-[64px] border-2 border-white rounded-[50%]" src="./views/assets/img/logo-escolink.png" alt="">
                <p class="">Escolink</p>
            </a>

            <!-- Links -->
            <div 
                class="
                flex items-center
                
                max-sm:hidden"
            >
                <ul class="flex gap-[50px]">
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="./views/login.php">Login</a></li>
                </ul>
            </div>

            <div 
                class="
                text-white hidden

                max-sm:block"
            >
                <span class="material-symbols-outlined" style="font-size: 40px;">
                    menu
                </span>
            </div>

            <!-- Dark Mode -->
            <div class="flex items-center ">

                <div class="flex p-2 items-center w-[100px] h-[50px] border-1 border-black rounded-[30px] bg-white">

                    <div class="flex items-center">

                        <div class="flex justify-center items-center w-[40px] h-[40px] rounded-[25px] bg-[#022E51]">
                            <span class="material-symbols-outlined">
                                wb_sunny
                            </span>
                        </div>

                        <div class="hidden">
                            <span class="material-symbols-outlined">
                                dark_mode
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </nav>

    </header>

    <main class="h-screen">

        <section class="h-[calc(1024px - 64px)] border-2 border-black">

            <div class="border-2 border-black w-[300px] h-[300px]" id="inicio">

                <h1 class="text-[64px] font-bold">Escolink</h1>

                <p class="text-justify mb-[20px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur ullam in optio? Accusantium suscipit sunt obcaecati corrupti ut maxime facere explicabo culpa minima, aperiam recusandae quasi perferendis laboriosam similique eum?</p>

                <a class="bg-[#022E51] text-white py-[10px] px-[20px] rounded-[10px]" href="./views/login.php">Entrar</a>

                <a class="border-2 border-[#022E51] py-[10px] px-[20px] rounded-[10px]" href="#">Baixar o Escolink</a>

            </div>

        </section>

        <!-- Sobre -->
        <section></section>

        <!-- Contato -->
        <section></section>

    </main>
    
</body>

</html>