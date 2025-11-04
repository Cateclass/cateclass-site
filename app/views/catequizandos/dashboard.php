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

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <!-- Título e frase -->
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Bem vindo de Volta Matheus!
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Aqui está um resumo de caminhada das suas turmas.
            </p>
        </div>

        <!-- Cards -->
        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total de turmas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">1</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">people</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Atividades</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">2</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">assignment</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pendentes</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">0</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">pending</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Concluídas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">3</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">check_circle</i>
                </div>
            </div>

        </div>

        <div class="mt-8 flex flex-col lg:flex-row gap-6">

            <div class="lg:w-2/3">
                <div class="flex items-center gap-2 mb-4">
                    <i class="material-icons text-gray-700 text-2xl">book</i>
                    <h2 class="text-xl font-semibold text-gray-800">Minhas turmas</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="bg-white p-4 rounded-lg shadow-md border-t-4 border-indigo-600">
                        <div class="flex justify-between items-center">
                            <p class="font-bold text-indigo-700">2º Ano Crisma</p>
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-0.5 rounded-full">
                            ONLINE
                            </span>
                        </div>
                            <p class="text-sm text-gray-600 mt-1">Crisma</p>
                            <p class="text-xs text-gray-400 mt-2">Código: C32R5GT</p>
                    </div>

                        <div class="bg-white p-4 rounded-lg shadow-md border-t-4 border-purple-600">
                            <div class="flex justify-between items-center">
                            <p class="font-bold text-indigo-700">1º Ano Crisma</p>
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-0.5 rounded-full">
                            CONCLUÍDO
                            </span>
                        </div>
                            <p class="text-sm text-gray-600 mt-1">Crisma</p>
                            <p class="text-xs text-gray-400 mt-2">Código: C32R5GT</p>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow-md border-t-4 border-teal-600">
                            <div class="flex justify-between items-center">
                            <p class="font-bold text-indigo-700">1º Ano Eucaristia</p>
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-0.5 rounded-full">
                            CONCLUÍDO
                            </span>
                        </div>
                            <p class="text-sm text-gray-600 mt-1">Eucaristia</p>
                            <p class="text-xs text-gray-400 mt-2">Código: C32R5GT</p>
                        </div>

                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="flex flex-col gap-6">

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center gap-2 mb-4">
                            <i class="material-icons">event_note</i>
                            <h2 class="text-lg font-semibold">Interações Recentes</h2>
                        </div>
                        <div class="text-center py-4">
                            <div class="mx-auto bg-gray-100 rounded-full p-3 w-12 h-12 flex items-center justify-center">
                                <i class="material-icons text-gray-500">task_alt</i>
                            </div>
                            <p class="text-sm text-gray-500 mt-3">Nenhuma entrega pendente</p>
                        </div>
                    </div>

                    <div class="bg-indigo-600 p-6 rounded-lg shadow-md text-white">
                        <h2 class="text-lg font-semibold">Engajamento da Turma</h2>
                        <p class="text-sm text-indigo-100 mt-1">Seu trabalho na evangelização faz a diferença!</p>

                        <div class="w-full bg-indigo-400 rounded-full h-2.5 mt-4">
                            <div class="bg-white h-2.5 rounded-full" style="width: 75%"></div>
                        </div>
                        <p class="text-xs text-indigo-100 mt-2">75% das atividades concluídas</p>
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