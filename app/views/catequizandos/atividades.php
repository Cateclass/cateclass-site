<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequizando | Atividades</title>
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
                Atividades e Reflexões
            </h1>
            <p class="mt-1 text-md text-gray-500">
                Veja suas atividades, entregue as pendentes e acompanhe seu progresso.
            </p>
        </div>

        <?php if (isset($dados['mensagem'])): ?>
            <div class="p-3 my-4 text-sm text-center rounded-lg 
                <?php echo ($dados['mensagem_tipo'] == 'sucesso') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                <?php echo $dados['mensagem']; ?>
            </div>
        <?php endif; ?>

        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        <?php echo $dados['stats']['total']; ?>
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
                    <i class="material-icons text-gray-600">schedule</i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Não Enviadas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        <?php echo $dados['stats']['naoEnviadas']; ?>
                    </p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="material-icons text-red-500">error_outline</i>
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
                    <i class="material-icons text-green-500">check_circle</i>
                </div>
            </div>
        </div>

        <?php
        $filtroAtivo = $dados['filtro_ativo'];
        $classeAtiva = "py-4 px-1 border-b-2 border-indigo-600 font-semibold text-indigo-600";
        $classeInativa = "py-4 px-1 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700 hover:border-gray-300";
        ?>

        <div class="mt-8 w-full border-b border-gray-200">
            <nav class="flex gap-8 -mb-px">
                
                <a href="/cateclass-site/app/catequizando/atividades?filtro=todas" 
                   class="<?php echo ($filtroAtivo == 'todas') ? $classeAtiva : $classeInativa; ?>">
                    Todas
                </a>

                <a href="/cateclass-site/app/catequizando/atividades?filtro=pendentes" 
                   class="<?php echo ($filtroAtivo == 'pendentes') ? $classeAtiva : $classeInativa; ?>">
                    Pendentes
                </a>
                
                <a href="/cateclass-site/app/catequizando/atividades?filtro=atrasadas" 
                   class="<?php echo ($filtroAtivo == 'atrasadas') ? $classeAtiva : $classeInativa; ?>">
                    Atrasadas
                </a>

                <a href="/cateclass-site/app/catequizando/atividades?filtro=concluidas" 
                   class="<?php echo ($filtroAtivo == 'concluidas') ? $classeAtiva : $classeInativa; ?>">
                    Concluídas
                </a>

            </nav>
        </div>

        <div class="mt-6 flex flex-col gap-6">

            <?php if (empty($dados['lista_atividades'])): ?>
                
                <p class="text-gray-600 p-4 bg-white rounded-lg shadow-md">
                    Nenhuma atividade encontrada para este filtro.
                </p>

            <?php else: ?>
                <?php foreach ($dados['lista_atividades'] as $atividade): ?>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            
                            <div class="flex items-center gap-3">
                                <h2 class="text-xl font-semibold text-gray-800">
                                    <?php echo htmlspecialchars($atividade->titulo); ?>
                                </h2>
                                <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <?php echo htmlspecialchars($atividade->tipo); ?>
                                </span>
                            </div>

                            <?php 
                            $estaConcluida = !is_null($atividade->id_resposta);
                            
                            $estaAtrasada = false;
                            $classeData = 'text-gray-500';
                            
                            if ($atividade->data_entrega && !$estaConcluida) {
                                $dataEntrega = new DateTime($atividade->data_entrega);
                                $agora = new DateTime();
                                if ($dataEntrega < $agora) {
                                    $estaAtrasada = true;
                                    $classeData = 'text-red-600 font-semibold bg-red-100 px-2 py-1 rounded-md';
                                }
                            }
                            ?>

                            <?php if ($estaConcluida): ?>
                                <a href="/cateclass-site/app/catequizando/atividade?id=<?php echo $atividade->id_atividade; ?>" class="mt-4 sm:mt-0 bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition-colors">
                                    Ver Resposta
                                </a>
                            <?php elseif ($estaAtrasada): ?>
                                <a href="/cateclass-site/app/catequizando/atividade?id=<?php echo $atividade->id_atividade; ?>" class="mt-4 sm:mt-0 bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-700 transition-colors">
                                    Ver (Atrasada)
                                </a>
                            <?php else: ?>
                                <a href="/cateclass-site/app/catequizando/atividade?id=<?php echo $atividade->id_atividade; ?>" class="mt-4 sm:mt-0 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition-colors">
                                    Ver Atividade
                                </a>
                            <?php endif; ?>
                        </div>

                        <p class="mt-3 text-sm text-gray-600">
                            <?php echo htmlspecialchars($atividade->descricao ?? ''); ?>
                        </p>

                        <div class="mt-4 pt-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8">
                            
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <i class="material-icons text-base">people_outline</i>
                                <span>Turma: <?php echo htmlspecialchars($atividade->nome_turma); ?></span>
                            </div>

                            <div class="flex items-center gap-2 text-sm <?php echo $classeData; ?>">
                                <i class="material-icons text-base">calendar_today</i>
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

                            <?php if ($estaConcluida): ?>
                                <div class="flex items-center gap-2 text-sm text-green-600 font-medium">
                                    <i class="material-icons text-base">check_circle</i>
                                    <span>Concluído</span>
                                </div>
                            <?php elseif ($estaAtrasada): ?>
                                <div class="flex items-center gap-2 text-sm text-red-600 font-medium">
                                    <i class="material-icons text-base">error</i>
                                    <span>Atrasada</span>
                                </div>
                            <?php else: ?>
                                <div class="flex items-center gap-2 text-sm text-blue-600 font-medium">
                                    <i class="material-icons text-base">schedule</i>
                                    <span>Pendente</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                
                <?php endforeach; ?>
            <?php endif; ?>

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