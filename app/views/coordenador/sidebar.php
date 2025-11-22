<!-- Sidebar -->
<aside id="sidebar" class="fixed lg:relative bg-white w-[280px] lg:w-[300px] h-screen
                         flex flex-col z-50
                         -translate-x-full lg:translate-x-0
                         transition-transform duration-300 ease-in-out shadow-lg lg:shadow-none">

    <!-- "header" -->
    <div class="flex items-center gap-[10px] py-[15px] mb-[30px] border-b-1 border-black">
        <img class="w-[100px] rounded-[50%]" src="/cateclass-site/app/views/assets/img/logotipo.jpg" alt="">
        
        <div>
            <p>CateClass</p>
            <span class="text-[#4A9FFF]">Plataforma Educacional</span>
        </div>
        <button id="menu-close" class="lg:hidden absolute top-3 right-3 text-gray-600 hover:text-gray-900">
            <i class="material-icons text-3xl">close</i>
        </button>
    </div>

    <!-- Links de navegação -->
    <nav class="mb-[30px]">

        <ul class="list-none">

            <li>
                <a class="flex items-center gap-[10px] p-[10px] pl-[25px]" href="/cateclass-site/app/coordenador">
                    <i class="material-icons">home</i>
                    Dashboard
                </a>
            </li>

            <li>
                <a class="flex items-center gap-[10px] p-[10px] pl-[25px]" href="/cateclass-site/app/coordenador/turmas">
                    <i class="material-icons">people</i>
                    Turmas
                </a>
            </li>

            <li>
                <a class="flex items-center gap-[10px] p-[10px] pl-[25px]" href="/cateclass-site/app/coordenador/catequistas">
                    <i class="material-icons">content_paste</i>
                    Catequistas
                </a>
            </li>

            <li>
                <a class="flex items-center gap-[10px] p-[10px] pl-[25px]" href="/cateclass-site/app/coordenador/catequizandos">
                    <i class="material-icons">school</i>
                    Catequizandos
                </a>
            </li>

            <!-- <li>
                <a class="flex items-center gap-[10px] p-[10px] pl-[25px]" href="comunicados.php">
                    <i class="material-icons">message</i>
                    Comunicados
                </a>
            </li> -->

        </ul>

    </nav>

    <div class="absolute bottom-[30px] w-[100%]">

        <div class="pb-[15px] mb-[15px] mx-auto border-b border-black">  

        </div>

        <div class="flex justify-center">

            <a class="flex items-center gap-[10px] bg-[#BEDDF5] text-[#fff] w-[250px] py-[7px] pl-[10px] mt-[15px] rounded-[7px] text-center" href="/cateclass-site/app/coordenador/perfil">
                <div class="flex justify-center items-center w-[40px] h-[40px] rounded-[50%] bg-[#4A9FFF]">
                    U
                </div>
                <div class="flex flex-col items-start">
                    <span class="text-black"><?= $_SESSION["usuario_nome"]; ?></span>
                    <span class="text-[#4A9FFF]">Coordenador</span>
                </div>
            </a>

        </div>       

    </div>

</aside>