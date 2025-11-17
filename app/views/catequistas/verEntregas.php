<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Entregas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">
        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <!-- Cabeçalho da Página -->
        <div>
            <!-- Link para voltar para a lista de atividades da turma -->
            <a href="/cateclass-site/app/catequista/turma?id=<?php echo $dados['atividade']->turma_id ?? 0; ?>" class="flex items-center gap-1 text-sm text-blue-600 hover:underline mb-2">
                <i class="material-icons-outlined text-base">arrow_back</i>
                Voltar para a Turma
            </a>

            <!-- Informações da Atividade -->
            <span class="text-xs font-semibold bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full">
                <?php echo htmlspecialchars($dados['atividade']->nome_turma); ?>
            </span>
            <h1 class="text-3xl font-bold text-gray-800 mt-1">
                <?php echo htmlspecialchars($dados['atividade']->titulo); ?>
            </h1>
            <p class="mt-1 text-md text-gray-500">
                <?php echo htmlspecialchars($dados['atividade']->descricao); ?>
            </p>
        </div>

        <!-- Seção de Entregas -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Entregas dos Alunos</h2>

            <?php if (isset($dados['mensagem'])): ?>
                <div class="p-3 my-4 text-sm text-center rounded-lg 
                    <?php echo ($dados['mensagem_tipo'] == 'sucesso') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                    <?php echo $dados['mensagem']; ?>
                </div>
            <?php endif; ?>

            <!-- Verifica se há respostas -->
            <?php if (empty($dados['respostas'])): ?>
                
                <p class="text-gray-600 p-4 bg-white rounded-lg shadow-md">
                    Nenhum aluno enviou uma resposta para esta atividade ainda.
                </p>

            <?php else: ?>

                <!-- Loop (foreach) para cada resposta -->
                <div class="flex flex-col gap-4">
                    <?php foreach ($dados['respostas'] as $resposta): ?>
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            
                            <!-- Cabeçalho da Resposta (Nome do Aluno) -->
                            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-semibold">
                                        <?php echo strtoupper(substr($resposta->nome_catequizando, 0, 1)); ?>
                                    </span>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">
                                            <?php echo htmlspecialchars($resposta->nome_catequizando); ?>
                                        </h3>
                                        <span class="text-xs text-gray-500">
                                            Enviado em: <?php echo (new DateTime($resposta->data_envio))->format('d/m/Y \à\s H:i'); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex gap-2 flex-shrink-0">
                                    <a href="/cateclass-site/app/catequista/resposta/<?php echo $resposta->id_resposta; ?>/corrigir" class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-md hover:bg-blue-200">
                                        <?php echo (empty($resposta->comentario_catequista)) ? 'Dar Feedback' : 'Editar Feedback'; ?>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Corpo da Resposta -->
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <?php if (!is_null($resposta->texto) && !empty($resposta->texto)): ?>
                                    <!-- Caso 1: Atividade de TEXTO -->
                                    <p class="text-gray-700 whitespace-pre-wrap">
                                        <?php echo htmlspecialchars($resposta->texto); ?>
                                    </p>
                                <?php else: ?>
                                    <!-- Caso 2: Atividade de CONFIRMAÇÃO (texto é nulo) -->
                                    <div class="p-3 bg-green-50 text-green-700 border border-green-200 rounded-md flex items-center gap-2">
                                        <i class="material-icons-outlined text-base">check_circle</i>
                                        <span class="font-medium">Marcado como Concluído</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($resposta->comentario_catequista)): ?>
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <h4 class="text-sm font-semibold text-gray-600 mb-2">Seu Feedback:</h4>
                                    <div class="p-3 bg-gray-50 text-gray-700 border border-gray-200 rounded-md">
                                        <p class="whitespace-pre-wrap"><?php echo htmlspecialchars($resposta->comentario_catequista); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Script da Sidebar -->
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