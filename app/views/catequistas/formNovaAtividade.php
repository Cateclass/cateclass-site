<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Nova Atividade</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Criar Nova Atividade</h1>

            <form action="/cateclass-site/app/catequista/atividades/criar" method="POST">
                
                <?php if (isset($dados['mensagem'])): ?>
                    <div class="p-3 mb-4 text-sm text-center rounded-lg 
                         <?php echo ($dados['mensagem_tipo'] === 'sucesso') 
                               ? 'bg-green-100 text-green-700' 
                               : 'bg-red-100 text-red-700'; ?>">
                        <?php echo $dados['mensagem']; ?>
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <label for="turma_id" class="block text-sm font-medium text-gray-700 mb-1">Para qual turma?</label>
                    <select name="turma_id" id="turma_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                        <option value="">Selecione uma turma</option>
                        <?php if (isset($dados['turmas']) && !empty($dados['turmas'])): ?>
                            <?php foreach ($dados['turmas'] as $turma): ?>
                                <option value="<?php echo $turma->id_turma; ?>">
                                    <?php echo htmlspecialchars($turma->nome_turma); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título da Atividade</label>
                    <input type="text" name="titulo" id="titulo" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Ex: Reflexão sobre os 10 Mandamentos" required>
                </div>

                <div class="mb-4">
                    <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição / Instruções</label>
                    <textarea name="descricao" id="descricao" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Descreva o que o catequizando deve fazer..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo</label>
                        <select name="tipo" id="tipo" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                            <option value="reflexao">Reflexão (Texto)</option>
                            <option value="quiz">Quiz</option>
                            <option value="envio">Envio de Arquivo</option>
                        </select>
                    </div>
                    <div>
                        <label for="data_entrega" class="block text-sm font-medium text-gray-700 mb-1">Data de Entrega (Opcional)</label>
                        <input type="datetime-local" name="data_entrega" id="data_entrega" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="/cateclass-site/app/catequista/atividades" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
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