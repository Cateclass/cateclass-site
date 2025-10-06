<!-- Sidebar -->
<aside class="w-[120px] h-screen bg-[#fff] border-r-1 border-black">

    <!-- Sidebar Links -->
    <div class="flex flex-col items-center gap-[30px]">

        <!-- Logo -->
        <img 
            class="rounded-[50%] mt-[30px]"
            src="./../assets/img/logo-escolink.png" 
            alt=""
        >

        <!-- Home -->
        <a href="home.php">
            <div class="flex flex-col items-center text-[20px]">
                <span class="material-symbols-outlined" style="font-size: 40px">
                    home
                </span>
                <p>Home</p>
            </div>
        </a>

        <!-- Boletim -->
        <a href="boletim.php">
            <div class="flex flex-col items-center text-[20px]">
                <span class="material-symbols-outlined" style="font-size: 40px">
                    book
                </span>
                <p>Boletim</p>
            </div>
        </a>

        <!-- Agenda -->
        <a href="agenda.php">
            <div class="flex flex-col items-center text-[20px]">
                <span class="material-symbols-outlined" style="font-size: 40px">
                    calendar_today
                </span>
                <p>Agenda</p>
            </div>
        </a>

        <!-- Mensagem -->
        <a href="mensagem.php">
            <div class="flex flex-col items-center text-[20px]">
                <span class="material-symbols-outlined" style="font-size: 40px">
                    chat
                </span>
                <p>Mensagem</p>
            </div>
        </a>

    </div>

</aside>

<!-- Menu Superior -->
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