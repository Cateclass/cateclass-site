<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Corrigir Atividade</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">
        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <!-- Cabeçalho -->
        <div>
            <!-- Link para voltar para a lista de entregas -->
            <a href="/cateclass-site/app/catequista/atividade/<?php echo $dados['atividade']->id_atividade; ?>/entregas" class="flex items-center gap-1 text-sm text-blue-600 hover:underline mb-2">
                <i class="material-icons-outlined text-base">arrow_back</i>
                Voltar para Entregas
            </a>

            <h1 class="text-3xl font-bold text-gray-800 mt-1">
                Corrigir Atividade
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Veja a resposta do aluno e envie seu feedback.
            </p>
        </div>

        <!-- Layout de 2 Colunas -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Coluna 1: Resposta do Aluno -->
            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <!-- Infos do Aluno -->
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-semibold">
                            <?php echo strtoupper(substr($dados['resposta']->nome_catequizando, 0, 1)); ?>
                        </span>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                <?php echo htmlspecialchars($dados['resposta']->nome_catequizando); ?>
                            </h3>
                            <span class="text-xs text-gray-500">
                                Enviado em: <?php echo (new DateTime($dados['resposta']->data_envio))->format('d/m/Y \à\s H:i'); ?>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Resposta -->
                    <div class="mt-4">
                        <h4 class="text-sm font-semibold text-gray-600 mb-2">Resposta Enviada:</h4>
                        <?php if (!is_null($dados['resposta']->texto) && !empty($dados['resposta']->texto)): ?>
                            <!-- Resposta de TEXTO -->
                            <div class="p-4 bg-gray-50 text-gray-700 border border-gray-200 rounded-md">
                                <p class="whitespace-pre-wrap"><?php echo htmlspecialchars($dados['resposta']->texto); ?></p>
                            </div>
                        <?php else: ?>
                            <!-- Resposta de CONFIRMAÇÃO -->
                            <div class="p-3 bg-green-50 text-green-700 border border-green-200 rounded-md flex items-center gap-2">
                                <i class="material-icons-outlined text-base">check_circle</i>
                                <span class="font-medium">Marcado como Concluído</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Coluna 2: Formulário de Feedback -->
            <div class="lg:col-span-1">
                <form action="/cateclass-site/app/catequista/resposta/salvar-correcao" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    <!-- Campos Ocultos para enviar IDs -->
                    <input type="hidden" name="id_resposta" value="<?php echo $dados['resposta']->id_resposta; ?>">
                    <input type="hidden" name="id_atividade" value="<?php echo $dados['resposta']->atividade_id; ?>">

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Seu Feedback</h3>

                    <!-- Mensagem de Erro (se houver) -->
                    <?php if (isset($dados['mensagem'])): ?>
                        <div class="p-3 mb-4 text-sm text-center rounded-lg bg-red-100 text-red-700">
                            <?php echo $dados['mensagem']; ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label for="comentario" class="block text-sm font-medium text-gray-700 mb-1">
                            Comentário (visível para o aluno):
                        </label>
                        <textarea 
                            id="comentario"
                            name="comentario"
                            rows="8"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Escreva seu feedback aqui..."
                        ><?php echo htmlspecialchars($dados['resposta']->comentario_catequista ?? ''); ?></textarea>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="mt-4 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition-colors"
                    >
                        Salvar Feedback
                    </button>
                </form>
            </div>

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