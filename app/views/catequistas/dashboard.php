<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Bem-vindo(a) de volta, <?php echo htmlspecialchars(explode(' ', $dados['nomeUsuario'])[0]); ?>!
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Aqui está um resumo da sua caminhada na catequese.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total de Turmas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $dados['stats']['total_turmas']; ?></p>
                </div>
                <span class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="material-icons-outlined text-3xl">groups</i>
                </span>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total de Catequizandos</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $dados['stats']['total_alunos']; ?></p>
                </div>
                <span class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="material-icons-outlined text-3xl">school</i>
                </span>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total de Atividades</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $dados['stats']['total_atividades']; ?></p>
                </div>
                <span class="p-3 rounded-full bg-gray-100 text-gray-600">
                    <i class="material-icons-outlined text-3xl">inventory_2</i>
                </span>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pendentes Correção</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $dados['stats']['pendentes_correcao']; ?></p>
                </div>
                <span class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="material-icons-outlined text-3xl">hourglass_empty</i>
                </span>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Acesso Rápido às Turmas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (empty($dados['turmas'])): ?>
                    <p class="text-gray-600 col-span-3">Você ainda não cadastrou nenhuma turma.</p>
                <?php else: ?>
                    <?php 
                        $cores = ['bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-red-500'];
                        $i = 0;
                    ?>
                    <?php foreach ($dados['turmas'] as $turma): ?>
                        <?php $cor = $cores[$i % count($cores)]; $i++; ?>
                        
                        <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                            <div class="h-10 <?php echo $cor; ?>"></div>
                            
                            <a href="/cateclass-site/app/catequista/turma/<?php echo $turma->id_turma; ?>/editar" class="absolute top-12 right-4 text-gray-400 hover:text-gray-600" title="Editar Turma">
                                <i class="material-icons-outlined">more_vert</i>
                            </a>

                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-800 mb-2 h-14">
                                    <?php echo htmlspecialchars($turma->nome_turma); ?>
                                </h3>
                                <p class="text-sm text-gray-600 mb-4 h-12">
                                    <?php echo htmlspecialchars($turma->nome_etapa); ?>
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs font-medium text-gray-400 bg-gray-100 px-2 py-1 rounded">
                                        <?php echo htmlspecialchars($turma->codigo_turma); ?>
                                    </span>
                                    <a href="/cateclass-site/app/catequista/turma?id=<?php echo $turma->id_turma; ?>" class="text-sm font-semibold text-blue-600 hover:underline">
                                        Gerenciar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </main>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose = document.getElementById('menu-close');
        function openMenu() {
            if (sidebar) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            }
        }
        function closeMenu() {
            if (sidebar) {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
            }
        }
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