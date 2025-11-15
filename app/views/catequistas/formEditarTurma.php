<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Editar Turma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <a href="/cateclass-site/app/catequista/turmas" class="flex items-center gap-2 text-sm text-gray-600 hover:text-blue-600 mb-4">
            <i class="material-icons-outlined">arrow_back</i>
            Voltar para Minhas Turmas
        </a>

        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Turma</h1>
            <form action="/cateclass-site/app/catequista/turma/atualizar" method="POST">
                
                <input type="hidden" name="id_turma" value="<?php echo $dados['turma']->id_turma; ?>">
                
                <?php if (isset($dados['mensagem'])): ?>
                    <div class="p-3 mb-4 text-sm text-center rounded-lg 
                         <?php echo ($dados['mensagem_tipo'] === 'sucesso') 
                               ? 'bg-green-100 text-green-700' 
                               : 'bg-red-100 text-red-700'; ?>">
                        <?php echo $dados['mensagem']; ?>
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <label for="nome_turma" class="block text-sm font-medium text-gray-700 mb-1">Nome da Turma</label>
                    <input type="text" name="nome_turma" id="nome_turma" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" 
                           value="<?php echo htmlspecialchars($dados['turma']->nome_turma); ?>" required>
                </div>

                <div class="mb-4">
                    <label for="etapa_id" class="block text-sm font-medium text-gray-700 mb-1">Etapa</label>
                    <select name="etapa_id" id="etapa_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                        <option value="">Selecione uma etapa</option>
                        <?php if (isset($dados['etapas']) && !empty($dados['etapas'])): ?>
                            <?php foreach ($dados['etapas'] as $etapa): ?>
                                <option value="<?php echo $etapa->id_etapa; ?>"
                                    <?php echo ($etapa->id_etapa == $dados['turma']->etapa_id) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($etapa->nome_etapa); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tipo_turma" class="block text-sm font-medium text-gray-700 mb-1">Modalidade</label>
                    <select name="tipo_turma" id="tipo_turma" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                        <option value="Online" <?php echo ($dados['turma']->tipo_turma == 'Online') ? 'selected' : ''; ?>>Online</option>
                        <option value="Presencial" <?php echo ($dados['turma']->tipo_turma == 'Presencial') ? 'selected' : ''; ?>>Presencial</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="data_inicio" class="block text-sm font-medium text-gray-700 mb-1">Data de Início</label>
                        <input type="date" name="data_inicio" id="data_inicio" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" 
                               value="<?php echo htmlspecialchars($dados['turma']->data_inicio); ?>" required>
                    </div>
                    <div>
                        <label for="data_termino" class="block text-sm font-medium text-gray-700 mb-1">Data de Término (Opcional)</label>
                        <input type="date" name="data_termino" id="data_termino" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                               value="<?php echo htmlspecialchars($dados['turma']->data_termino ?? ''); ?>">
                    </div>
                </div>

                <div class="flex justify-end items-center">
                    <div class="flex gap-4">
                        <a href="/cateclass-site/app/catequista/turmas" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                            Cancelar
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Salvar Alterações
                        </button>
                    </div>
                </div>

            </form>
            <div class="mt-6 pt-6 border-t border-gray-200">
                <form action="/cateclass-site/app/catequista/turma/excluir" method="POST" onsubmit="return confirm('TEM CERTEZA? Excluir uma turma é uma ação permanente e apagará TODAS as suas atividades, respostas e matrículas de alunos. Esta ação não pode ser desfeita.');" class="m-0">
                    <input type="hidden" name="id_turma" value="<?php echo $dados['turma']->id_turma; ?>">
                    <button type="submit" class="text-sm font-medium text-red-600 hover:bg-red-50 py-2 px-4 rounded-md">
                        Excluir Turma
                    </button>
                </form>
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