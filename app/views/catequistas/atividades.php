<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Atividades</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'fundo': '#E5ECFF',
          }
        }
      }
    }
  </script>
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
                    Atividades e Reflexões
                </h1>
                <p class="mt-1 text-md text-gray-500">
                    Proponha atividades e acompanhe a participação da turma.
                </p>
            </div>
            <button class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                <i class="material-icons-outlined">add_circle_outline</i>
                <span>Adicionar ou criar atividade</span>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                <span class="p-3 rounded-full bg-gray-100 text-gray-600 mb-2">
                    <i class="material-icons-outlined text-3xl">inventory_2</i>
                </span>
                <p class="text-3xl font-bold text-gray-900">3</p>
                <p class="text-sm text-gray-500">Total</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                <span class="p-3 rounded-full bg-yellow-100 text-yellow-600 mb-2">
                    <i class="material-icons-outlined text-3xl">hourglass_empty</i>
                </span>
                <p class="text-3xl font-bold text-gray-900">2</p>
                <p class="text-sm text-gray-500">Pendentes</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                <span class="p-3 rounded-full bg-red-100 text-red-600 mb-2">
                    <i class="material-icons-outlined text-3xl">error_outline</i>
                </span>
                <p class="text-3xl font-bold text-gray-900">2</p>
                <p class="text-sm text-gray-500">Não Enviadas</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                <span class="p-3 rounded-full bg-green-100 text-green-600 mb-2">
                    <i class="material-icons-outlined text-3xl">check_circle_outline</i>
                </span>
                <p class="text-3xl font-bold text-gray-900">2</p>
                <p class="text-sm text-gray-500">Concluídas</p>
            </div>
        </div>

        <div class="border-b border-gray-300 mb-6">
            <nav class="flex gap-6 -mb-px">
                <button class="py-4 px-1 border-b-2 border-blue-600 text-blue-600 font-semibold">
                    Todas
                </button>
                <button class="py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-400">
                    Pendentes
                </button>
                <button class="py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-400">
                    Atrasadas
                </button>
                <button class="py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-400">
                    Concluídas
                </button>
            </nav>
        </div>

        <div class="flex flex-col gap-4">

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div class="flex items-center gap-3">
                        <h3 class="text-lg font-semibold text-gray-800">Lição: Os Mandamentos de Deus</h3>
                        <span class="text-xs font-medium bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full">quiz</span>
                    </div>
                    <div class="flex gap-2 flex-shrink-0">
                        <button class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-md hover:bg-gray-200">editar</button>
                        <button class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-md hover:bg-blue-200">ver entregas</button>
                    </div>
                </div>
                <p class="text-gray-600 mt-2 text-sm">Aprendizado sobre os Dez Mandamentos e sua importância na vida cristã.</p>
                <div class="flex flex-col sm:flex-row justify-between sm:items-center mt-4 pt-4 border-t border-gray-100 gap-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="material-icons-outlined text-base">group</i>
                        <span>Turma encontrada</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="material-icons-outlined text-base">calendar_today</i>
                        <span>Entrega: 20/11/2025 - 23:59</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div class="flex items-center gap-3">
                        <h3 class="text-lg font-semibold text-gray-800">Atividade: A Vida de Jesus Cristo</h3>
                        <span class="text-xs font-medium bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full">quiz</span>
                    </div>
                    <div class="flex gap-2 flex-shrink-0">
                        <button class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-md hover:bg-gray-200">editar</button>
                        <button class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-md hover:bg-blue-200">ver entregas</button>
                    </div>
                </div>
                <p class="text-gray-600 mt-2 text-sm">Pesquisa sobre os principais momentos da vida de Jesus conforme os Evangelhos</p>
                <div class="flex flex-col sm:flex-row justify-between sm:items-center mt-4 pt-4 border-t border-gray-100 gap-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="material-icons-outlined text-base">group</i>
                        <span>Turma encontrada</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="material-icons-outlined text-base">calendar_today</i>
                        <span>Entrega: 20/11/2025 - 23:59</span>
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