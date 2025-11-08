<aside id="sidebar" class="fixed lg:relative bg-white w-[280px] lg:w-[300px] h-screen flex flex-col z-50                              transition-transform duration-300 ease-in-out shadow-lg lg:shadow-none lg:translate-x-0">

        <!-- Logo e Cabeçalho da Sidebar -->
        <div class="relative flex items-center gap-3 p-4 mb-4 border-b">
            <!-- Usei um placeholder para a imagem -->
            <img class="w-20 h-20 rounded-full" src="" alt="Logotipo CateClass">
            <div>
                <p class="font-bold">CateClass</p>
                <span class="text-sm text-[#4A9FFF]">Plataforma Educacional</span>
            </div>
            <!-- Botão de fechar (para mobile) -->
            <button id="menu-close" class="lg:hidden absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                <i class="material-icons text-3xl">close</i>
            </button>
        </div>

        <!-- Navegação Principal (links para Catequista) -->
        <nav class="flex-1">
            <ul class="list-none p-0">
                <li>
                    <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="/cateclass-site/app/catequistas">
                        <i class="material-icons">home</i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="/cateclass-site/app/catequistas/turmas">
                        <i class="material-icons">groups</i>
                        Minhas Turmas
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="/cateclass-site/app/catequistas/atividades">
                        <i class="material-icons">assignment</i>
                        Atividades
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="#">
                        <i class="material-icons">people</i>
                        Alunos
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 p-3 pl-6 hover:bg-gray-100 rounded-lg mx-2" href="#">
                        <i class="material-icons">folder_shared</i>
                        Materiais
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Seção Inferior (Ações Rápidas e Perfil) -->
        <div class="p-4">
            <div class="pb-4 mb-4 border-b">
                <p class="pl-2 uppercase text-sm font-semibold text-gray-600 mb-3">Ações rápidas</p>

                <div class="flex flex-col items-center gap-3">
                    <!-- Ação Rápida 1: Criar Turma (ao invés de Entrar na Turma) -->
                    <a class="flex justify-center items-center gap-2 bg-[#008000] text-white w-full py-2 rounded-lg" href="#">
                        <i class="material-icons">group_add</i>
                        Criar Turma
                    </a>
                    
                    <!-- Ação Rápida 2: Criar Atividade (opcional) -->
                    <a class="flex justify-center items-center gap-2 bg-[#4A9FFF] text-white w-full py-2 rounded-lg" href="#">
                        <i class="material-icons">add_task</i>
                        Criar Atividade
                    </a>

                    <!-- Notificação (Exemplo de 'Atividades para Corrigir') -->
                    <a class="flex justify-center items-center gap-2 bg-[#D4F3E6] text-[#40B568] w-full py-2 rounded-lg" 
                        href="#"> 
                        <i class="fa fa-bell text-xl"></i>
                        3 Atividades para Corrigir
                    </a>
                </div>
            </div>

            <!-- Perfil do Usuário (Catequista) -->
            <div class="flex justify-center">
                <a class="flex items-center gap-3 bg-[#BEDDF5] w-full p-2 rounded-lg" href="#">
                    <div class="flex justify-center items-center w-10 h-10 rounded-full bg-[#4A9FFF] text-white font-bold">
                        C
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="text-black font-semibold">
                            Nome do Catequista
                        </span>
                        <span class="text-sm text-[#4A9FFF]">
                            Catequista
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </aside>