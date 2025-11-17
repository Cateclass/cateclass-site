<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Editar Atividade</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>
        
        <a href="/cateclass-site/app/catequista/atividades" class="flex items-center gap-2 text-sm text-gray-600 hover:text-blue-600 mb-4">
            <i class="material-icons-outlined">arrow_back</i>
            Voltar para Atividades
        </a>

        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
            
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar atividade</h1>

            <?php if (isset($dados['mensagem'])): ?>
                <div class="p-3 mb-4 text-sm text-center rounded-lg 
                    <?php echo ($dados['mensagem_tipo'] == 'sucesso') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                    <?php echo $dados['mensagem']; ?>
                </div>
            <?php endif; ?>

            <form action="/cateclass-site/app/catequista/atividade/atualizar" method="POST" class="space-y-6">

                <!-- Campo oculto com o ID da atividade -->
                <input type="hidden" name="id_atividade" value="<?php echo $dados['atividade']->id_atividade; ?>">

                <div>
                    <label for="turma_id" class="block text-sm font-medium text-gray-700 mb-2">Para qual turma?</label>
                    <select id="turma_id" name="turma_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Selecione uma turma --</option>
                        <?php if (!empty($dados['turmas'])): ?>
                            <?php foreach ($dados['turmas'] as $turma): ?>
                                <option value="<?php echo $turma->id_turma; ?>" 
                                    <?php echo ($turma->id_turma == $dados['atividade']->turma_id) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($turma->nome_turma); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título da atividade</label>
                    <input type="text" id="titulo" name="titulo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                           value="<?php echo htmlspecialchars($dados['atividade']->titulo); ?>" required>
                </div>

                <div>
                    <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">Instruções (Descrição)</label>
                    <textarea id="descricao" name="descricao" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"><?php echo htmlspecialchars($dados['atividade']->descricao ?? ''); ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="data_entrega" class="block text-sm font-medium text-gray-700 mb-2">Data de Entrega (Opcional)</label>
                        <?php
                            $dataEntrega = $dados['atividade']->data_entrega ? (new DateTime($dados['atividade']->data_entrega))->format('Y-m-d\TH:i') : '';
                        ?>
                        <input type="datetime-local" id="data_entrega" name="data_entrega" value="<?php echo $dataEntrega; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                        <select id="tipo" name="tipo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="reflexao" <?php echo ($dados['atividade']->tipo == 'reflexao') ? 'selected' : ''; ?>>Reflexão</option>
                            <option value="quiz" <?php echo ($dados['atividade']->tipo == 'quiz') ? 'selected' : ''; ?>>Quiz</option>
                            <option value="leitura" <?php echo ($dados['atividade']->tipo == 'leitura') ? 'selected' : ''; ?>>Leitura</option>
                            <option value="video" <?php echo ($dados['atividade']->tipo == 'video') ? 'selected' : ''; ?>>Vídeo</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Entrega</label>
                    <fieldset class="mt-2">
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="tipo_entrega_texto" name="tipo_entrega" type="radio" value="texto" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" 
                                    <?php echo ($dados['atividade']->tipo_entrega == 'texto') ? 'checked' : ''; ?>>
                                <label for="tipo_entrega_texto" class="ml-3 block text-sm text-gray-700">
                                    Resposta com Texto
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="tipo_entrega_confirmacao" name="tipo_entrega" type="radio" value="confirmacao" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300"
                                    <?php echo ($dados['atividade']->tipo_entrega == 'confirmacao') ? 'checked' : ''; ?>>
                                <label for="tipo_entrega_confirmacao" class="ml-3 block text-sm text-gray-700">
                                    Apenas Confirmação
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="text-right">
                    <a href="/cateclass-site/app/catequista/atividades" class="text-gray-600 py-2 px-4 rounded-md hover:bg-gray-100">
                        Cancelar
                    </a>
                    <button type="submit" class="ml-4 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Salvar Alterações
                    </button>
                </div>
            </form>
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