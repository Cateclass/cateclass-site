<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequistas | Detalhes da Turma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">

        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>

        <div class="mb-6">
            <a href="/cateclass-site/app/catequista/turmas" class="flex items-center gap-2 text-sm text-blue-600 hover:underline">
                <i class="material-icons-outlined text-base">arrow_back</i>
                Voltar para Minhas Turmas
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between md:items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        <?php echo htmlspecialchars($dados['turma']->nome_turma); ?>
                    </h1>
                    <p class="mt-1 text-md text-gray-500">
                        <?php echo htmlspecialchars($dados['turma']->nome_etapa); ?>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 md:text-right">
                    <p class="text-sm text-gray-500">Código da Turma:</p>
                    <p class="text-2xl font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg inline-block">
                        <?php echo htmlspecialchars($dados['turma']->codigo_turma); ?>
                    </p>
                </div>
            </div>
        </div>
        
        <?php if (isset($dados['mensagem'])): ?>
            <div class="p-3 mb-4 text-sm text-center rounded-lg 
                 <?php echo ($dados['mensagem_tipo'] === 'sucesso') 
                       ? 'bg-green-100 text-green-700' 
                       : 'bg-red-100 text-red-700'; ?>">
                <?php echo $dados['mensagem']; ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 flex flex-col gap-6">
                <h2 class="text-2xl font-semibold text-gray-800">Mural de Atividades</h2>

                <?php if (empty($dados['atividades'])): ?>
                    <p class="text-gray-600 bg-white p-4 rounded-lg shadow-md">Nenhuma atividade criada para esta turma ainda.</p>
                <?php else: ?>
                    <?php foreach ($dados['atividades'] as $atividade): ?>
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                <div class="flex items-center gap-3">
                                    <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($atividade->titulo); ?></h3>
                                    <span class="text-xs font-medium bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full"><?php echo htmlspecialchars($atividade->tipo); ?></span>
                                </div>
                                <div class="flex gap-2 flex-shrink-0">
                                    <a href="/cateclass-site/app/catequista/atividade/<?php echo $atividade->id_atividade; ?>/editar" class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-md hover:bg-gray-200">editar</a>
                                    <a href="/cateclass-site/app/catequista/atividade/<?php echo $atividade->id_atividade; ?>/entregas" class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-md hover:bg-blue-200">ver entregas</a>
                                </div>
                            </div>
                            <p class="text-gray-600 mt-2 text-sm"><?php echo htmlspecialchars($atividade->descricao ?? ''); ?></p>
                            <div class="flex flex-col sm:flex-row justify-between sm:items-center mt-4 pt-4 border-t border-gray-100 gap-4">
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <i class="material-icons-outlined text-base">calendar_today</i>
                                    <span>
                                        Entrega: 
                                        <?php 
                                        if ($atividade->data_entrega) {
                                            $data = new DateTime($atividade->data_entrega);
                                            echo $data->format('d/m/Y - H:i');
                                        } else {
                                            echo 'Sem data definida';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="lg:col-span-1 flex flex-col gap-6">
                <h2 class="text-2xl font-semibold text-gray-800">Catequizandos (<?php echo count($dados['catequizandos']); ?>)</h2>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <ul class="flex flex-col gap-4">
                        <?php if (empty($dados['catequizandos'])): ?>
                            <p class="text-sm text-gray-500">Nenhum catequizando matriculado nesta turma.</p>
                        <?php else: ?>
                            <?php foreach ($dados['catequizandos'] as $aluno): ?>
                                <li class="flex items-center justify-between gap-3 pb-3 border-b border-gray-100 last:border-b-0">
                                    <div class="flex items-center gap-3">
                                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-semibold">
                                            <?php echo strtoupper(substr($aluno->nome, 0, 1)); ?>
                                        </span>
                                        <div>
                                            <p class="font-medium text-gray-800"><?php echo htmlspecialchars($aluno->nome); ?></p>
                                            <p class="text-sm text-gray-500"><?php echo htmlspecialchars($aluno->email); ?></p>
                                        </div>
                                    </div>
                                    
                                    <form action="/cateclass-site/app/catequista/turma/remover-aluno" method="POST" onsubmit="return confirm('Tem certeza que deseja remover <?php echo htmlspecialchars($aluno->nome); ?> desta turma?');" class="m-0">
                                        <input type="hidden" name="catequizando_id" value="<?php echo $aluno->id_usuario; ?>">
                                        <input type="hidden" name="turma_id" value="<?php echo $dados['turma']->id_turma; ?>">
                                        <button type="submit" class="text-gray-400 hover:text-red-500">
                                            <i class="material-icons-outlined">remove_circle_outline</i>
                                        </button>
                                    </form>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
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