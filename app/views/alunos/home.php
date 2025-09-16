<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Gooogle Fonts (Icons) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&" />

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Lucas Gabriel | Home</title>

</head>

<body class="flex">

    <!-- Sidebar -->
    <aside class="w-[120px] h-screen bg-[#022E51]">

        <!-- Sidebar Links -->
        <div class="flex flex-col items-center gap-[30px]">

            <img 
              class="border-2 border-white rounded-[50%] mt-[30px]"
              src="./../assets/img/logo-escolink.png" 
              alt=""
            >

            <a href="#">

                <div class="flex flex-col items-center text-white text-[20px]">

                        <span class="material-symbols-outlined" style="font-size: 40px">
                            home
                        </span>

                
                        <p>Home</p>

                </div>

            </a>

            <div class="flex flex-col items-center text-white text-[20px]">

                <span class="material-symbols-outlined" style="font-size: 40px">
                    book
                </span>

                <p>Boletim</p>

            </div>

            <div class="flex flex-col items-center text-white text-[20px]">

                <span class="material-symbols-outlined" style="font-size: 40px">
                    calendar_today
                </span>

                <p>Agenda</p>

            </div>

            <div class="flex flex-col items-center text-white text-[20px]">

                <span class="material-symbols-outlined" style="font-size: 40px">
                    chat
                </span>

                <p>Mensagem</p>

            </div>

        </div>

    </aside>

    <main>

        <h1 class="text-[36px] p-[20px]">Bem Vindo Lucas!</h1>

        <div class="absolute right-[10px] top-[10px]">

            <span 
              class="material-symbols-outlined hover:cursor-pointer" style="font-size: 40px"
            >
                dark_mode
            </span>

            <span 
              class="material-symbols-outlined hover:cursor-pointer" style="font-size: 40px"
              onclick="alert('Você não tem notificações!')"
            >
                notifications
            </span>

            <span class="material-symbols-outlined" style="font-size: 40px">
                settings
            </span>

            <span class="material-symbols-outlined" style="font-size: 40px">
                face
            </span>

        </div>

    </main>
    
</body>

</html>