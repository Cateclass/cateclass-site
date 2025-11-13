<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequista | Nova Atividade</title>
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
            
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Criar nova atividade</h1>

            <?php if (isset($dados['mensagem'])): ?>
                <div class="p-3 mb-4 text-sm text-center rounded-lg 
                    <?php echo ($dados['mensagem_tipo'] == 'sucesso') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                    <?php echo $dados['mensagem']; ?>
                </div>
            <?php endif; ?>

            <form action="/cateclass-site/app/catequista/atividades/criar" method="POST" class="space-y-6">

                <div>
                    <label for="turma_id" class="block text-sm font-medium text-gray-700 mb-2">Para qual turma?</label>
                    <select id="turma_id" name="turma_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Selecione uma turma --</option>
                        <?php if (!empty($dados['turmas'])): ?>
                            <?php foreach ($dados['turmas'] as $turma): ?>
                                <option value="<?php echo $turma->id_turma; ?>">
                                    <?php echo htmlspecialchars($turma->nome_turma); ?> (<?php echo htmlspecialchars($turma->nome_etapa); ?>)
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título da atividade</label>
                    <input type="text" id="titulo" name="titulo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: Reflexão sobre a Campanha da Fraternidade" required>
                </div>

                <div>
                    <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">Instruções (Descrição)</label>
                    <textarea id="descricao" name="descricao" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Descreva o que o catequizando deve fazer..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="data_entrega" class="block text-sm font-medium text-gray-700 mb-2">Data de Entrega (Opcional)</label>
                        <input type="datetime-local" id="data_entrega" name="data_entrega" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                        <select id="tipo" name="tipo" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="reflexao">Reflexão</option>
                            <option value="quiz">Quiz</option>
                            <option value="leitura">Leitura</option>
                            <option value="video">Vídeo</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Entrega</label>
                    <fieldset class="mt-2">
                        <legend class="sr-only">Tipo de Entrega</legend>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="tipo_entrega_texto" name="tipo_entrega" type="radio" value="texto" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" checked>
                                <label for="tipo_entrega_texto" class="ml-3 block text-sm text-gray-700">
                                    Resposta com Texto (Ex: uma reflexão)
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="tipo_entrega_confirmacao" name="tipo_entrega" type="radio" value="confirmacao" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                <label for="tipo_entrega_confirmacao" class="ml-3 block text-sm text-gray-700">
                                    Apenas Confirmação (Ex: "Reze uma Ave Maria")
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="text-right">
                    <a href="/cateclass-site/app/catequista/atividades" class="text-gray-600 py-2 px-4 rounded-md hover:bg-gray-100">
                        Cancelar
                    </a>
                    <button type="submit" class="ml-4 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Criar Atividade
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
        if (menuToggle) {
            menuToggle.addEventListener('click', () => sidebar.classList.add('translate-x-0'));
        }
        if (menuClose) {
            menuClose.addEventListener('click', () => sidebar.classList.remove('translate-x-0'));
        }
    });
    </script>
</body>
</html>