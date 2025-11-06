<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequizando | Dashboard</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Bem vindo de Volta <?php echo htmlspecialchars($dados['nomeUsuario']); ?>!
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Aqui está um resumo de caminhada das suas turmas.
            </p>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total de turmas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        <?php echo $dados['stats']['totalTurmas']; ?>
                    </p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">people</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Atividades</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        <?php echo $dados['stats']['totalAtividades']; ?>
                    </p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">assignment</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pendentes</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        <?php echo $dados['stats']['pendentes']; ?>
                    </p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-gray-600">pending</i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Concluídas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        <?php echo $dados['stats']['concluidas']; ?>
                    </p>
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

                    <?php if (empty($dados['turmas'])): ?>
                        <div class="col-span-1 md:col-span-2">
                            <p class="text-gray-600 p-4 bg-white rounded-lg shadow-md">
                                Você ainda não está em nenhuma turma.
                            </p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($dados['turmas'] as $turma): ?>
                        
                            <div class="bg-white p-4 rounded-lg shadow-md border-t-4 border-indigo-600">
                                <div class="flex justify-between items-center">
                                    <p class="font-bold text-indigo-700">
                                        <?php echo htmlspecialchars($turma->nome_turma); ?>
                                    </p>
                                    <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-0.5 rounded-full">
                                        <?php echo htmlspecialchars(strtoupper($turma->status)); ?>
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">
                                    <?php echo htmlspecialchars($turma->nome_etapa); ?>
                                </p>
                                </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

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
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose = document.getElementById('menu-close');
        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.add('translate-x-0');
            });
        }
        if (menuClose) {
            menuClose.addEventListener('click', () => {
                sidebar.classList.remove('translate-x-0');
            });
        }
    });
    </script>
</body>
</html>