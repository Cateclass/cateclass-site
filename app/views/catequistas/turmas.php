<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Turmas</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <div class="flex flex-col md:flex-row justify-between md:items-center mb-6 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Minhas Turmas
                </h1>
                <p class="mt-1 text-md text-gray-500">
                    Gerencie suas turmas e acompanhe a caminhada de fé
                </p>
            </div>
            <button class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                <i class="material-icons-outlined">add_circle_outline</i>
                <span>Nova turma</span>
            </button>
        </div>

        <div class="relative mb-8">
            <input 
                type="text" 
                placeholder="Pesquisar Turmas" 
                class="w-full pl-10 pr-4 py-3 rounded-lg shadow-sm border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <i class="material-icons-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                search
            </i>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                <div class="h-10 bg-blue-500"></div>
                <button class="absolute top-12 right-4 text-gray-400 hover:text-gray-600">
                    <i class="material-icons-outlined">more_vert</i>
                </button>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2 h-20">Catequese - Iniciação Primeiro Passos</h3>
                    <p class="text-sm text-gray-600 mb-4 h-12">Fundamentos da fé: Deus, Jesus e Oração</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-medium text-gray-400 bg-gray-100 px-2 py-1 rounded">CATIN2025</span>
                        <a href="#" class="text-sm font-semibold text-blue-600 hover:underline">ver mais</a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                <div class="h-10 bg-green-500"></div>
                 <button class="absolute top-12 right-4 text-gray-400 hover:text-gray-600">
                    <i class="material-icons-outlined">more_vert</i>
                </button>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2 h-20">Catequese - Iniciação Segundo Passos</h3>
                    <p class="text-sm text-gray-600 mb-4 h-12">Fundamentos da fé: Jesus e Oração</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-medium text-gray-400 bg-gray-100 px-2 py-1 rounded">CATEU2025</span>
                        <a href="#" class="text-sm font-semibold text-blue-600 hover:underline">ver mais</a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                <div class="h-10 bg-purple-500"></div>
                 <button class="absolute top-12 right-4 text-gray-400 hover:text-gray-600">
                    <i class="material-icons-outlined">more_vert</i>
                </button>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2 h-20">Catequese - Crisma Preparação</h3>
                    <p class="text-sm text-gray-600 mb-4 h-12">fundamentos da fé: Espírito santo e missão na igreja</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-medium text-gray-400 bg-gray-100 px-2 py-1 rounded">CATEU2025</span>
                        <a href="#" class="text-sm font-semibold text-blue-600 hover:underline">ver mais</a>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Seleciona os elementos da DOM
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle'); // Botão "hamburger"
        const menuClose = document.getElementById('menu-close');   // Botão "X" dentro da sidebar

        // Função para ABRIR o menu
        function openMenu() {
            if (sidebar) {
                // Remove a classe que esconde (-translate-x-full)
                sidebar.classList.remove('-translate-x-full');
                // Adiciona a classe que mostra (translate-x-0)
                sidebar.classList.add('translate-x-0');
            }
        }

        // Função para FECHAR o menu
        function closeMenu() {
            if (sidebar) {
                // Remove a classe que mostra (translate-x-0)
                sidebar.classList.remove('translate-x-0');
                // Adiciona a classe que esconde (-translate-x-full)
                sidebar.classList.add('-translate-x-full');
            }
        }

        // Adiciona os event listeners
        if (menuToggle) {
            menuToggle.addEventListener('click', openMenu);
        }

        if (menuClose) {
            menuClose.addEventListener('click', closeMenu);
        }
    });
    </script>
</body>
</html>