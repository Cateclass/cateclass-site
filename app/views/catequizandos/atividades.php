<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequizando | Dashboard</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <!-- Sidebar -->
    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Botao hamburguer -->
        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>
  
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Atividades e Reflexões
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Veja suas atividades, entregue as pendentes e acompanhe seu progresso.
            </p>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">3</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">assignment</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pendentes</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">2</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">schedule</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Não Enviadas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">2</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-red-500">error_outline</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Concluídas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">2</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-green-500">check_circle</i>
                </div>
            </div>

        </div>

        <div class="mt-8 w-full border-b border-gray-200">
            <nav class="flex gap-8 -mb-px">
                
                <a href="#" class="py-4 px-1 border-b-2 border-indigo-600 font-semibold text-indigo-600">
                Todas
                </a>

                <a href="#" class="py-4 px-1 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700 hover:border-gray-300">
                Pendentes
                </a>
                
                <a href="#" class="py-4 px-1 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700 hover:border-gray-300">
                Atrasadas
                </a>

                <a href="#" class="py-4 px-1 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700 hover:border-gray-300">
                Concluídas
                </a>

            </nav>
        </div>

        <div class="mt-6 flex flex-col gap-6">

            <div class="bg-white p-6 rounded-lg shadow-md">
                
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                
                    <div class="flex items-center gap-3">
                        <h2 class="text-xl font-semibold text-gray-800">Lição: Os Mandamentos de Deus</h2>
                        <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">
                        quiz
                        </span>
                    </div>

                    <a href="#" class="mt-4 sm:mt-0 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition-colors">
                        Ver Atividade
                    </a>
                </div>

                <p class="mt-3 text-sm text-gray-600">
                Aprendizado sobre os Dez Mandamentos e sua importância na vida cristã.
                </p>

                <div class="mt-4 pt-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8">
                
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="material-icons text-base">people_outline</i>
                        <span>Turma: 2º Ano Crisma</span>
                    </div>

                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="material-icons text-base">calendar_today</i>
                        <span>Entrega: 20/11/2025 - 23:59</span>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <script>
        // Espera o documento carregar
        document.addEventListener('DOMContentLoaded', () => {

            // Pega os elementos pelo ID
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');

            // Quando clicar no botão "Hambúrguer" (menu-toggle)
            if (menuToggle) {
                menuToggle.addEventListener('click', () => {
                    // Adiciona a classe 'translate-x-0', que sobrepõe o '-translate-x-full'
                    // e faz a sidebar aparecer.
                    sidebar.classList.add('translate-x-0');
                });
            }

            // Quando clicar no botão "X" (menu-close)
            if (menuClose) {
                menuClose.addEventListener('click', () => {
                    // Remove a classe 'translate-x-0', fazendo a sidebar
                    // voltar ao estado padrão '-translate-x-full' (escondida).
                    sidebar.classList.remove('translate-x-0');
                });
            }

            });
        </script>
</body>
</html>