<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequizando | Ver Atividade</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php';?>

    <main class="flex-1 p-8 overflow-y-auto">
        <button id="menu-toggle" class="lg:hidden text-gray-700 mb-4">
            <i class="material-icons text-3xl">menu</i>
        </button>
 
        <div class="max-w-4xl mx-auto">
        
            <a href="/cateclass-site/app/catequizando/atividades" class="flex items-center gap-2 text-sm text-gray-600 hover:text-indigo-600 mb-4">
                <i class="material-icons">arrow_back</i>
                Voltar para Atividades
            </a>

            <?php if (isset($dados['mensagem'])): ?>
                <div class="p-3 mb-4 text-sm text-center rounded-lg 
                    <?php echo ($dados['mensagem_tipo'] == 'sucesso') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                    <?php echo $dados['mensagem']; ?>
                </div>
            <?php endif; ?>

            <div class="bg-white p-6 rounded-lg shadow-md">
                
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <h1 class="text-3xl font-bold text-gray-800">
                            <?php echo htmlspecialchars($dados['atividade']->titulo); ?>
                        </h1>
                        <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            <?php echo htmlspecialchars($dados['atividade']->tipo); ?>
                        </span>
                    </div>
                </div>

                <div class="mt-4 pt-4 flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <i class="material-icons text-base">people_outline</i>
                        <span><?php echo htmlspecialchars($dados['atividade']->nome_turma); ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="material-icons text-base">badge</i>
                        <span><?php echo htmlspecialchars($dados['atividade']->nome_etapa); ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="material-icons text-base">calendar_today</i>
                        <span>
                            Entrega: 
                            <?php 
                            if ($dados['atividade']->data_entrega) {
                                $data = new DateTime($dados['atividade']->data_entrega);
                                echo $data->format('d/m/Y - H:i');
                            } else {
                                echo 'Sem data definida';
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <p class="mt-6 text-base text-gray-700 leading-relaxed">
                    <?php echo nl2br(htmlspecialchars($dados['atividade']->descricao)); ?>
                </p>
            </div>

            <?php if ($dados['resposta']): ?>
                
                <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Sua Resposta</h2>
                    <div class="p-4 bg-gray-50 rounded-md border border-gray-200">
                        <p class="text-gray-500 text-sm mb-2">
                            Enviado em: 
                            <?php 
                            $dataEnvio = new DateTime($dados['resposta']->data_envio);
                            echo $dataEnvio->format('d/m/Y \à\s H:i');
                            ?>
                        </p>
                        <p class="text-gray-800 leading-relaxed">
                            <?php echo nl2br(htmlspecialchars($dados['resposta']->texto)); ?>
                        </p>
                    </div>

                    <?php if ($dados['resposta']->comentario_catequista): ?>
                        <div class="mt-4 p-4 bg-blue-50 rounded-md border border-blue-200">
                            <h3 class="font-semibold text-blue-800 mb-2">Comentário do Catequista:</h3>
                            <p class="text-gray-800 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($dados['resposta']->comentario_catequista)); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

            <?php else: ?>

                <form action="/cateclass-site/app/catequizando/atividade/responder" method="POST" class="bg-white p-6 rounded-lg shadow-md mt-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Enviar Resposta</h2>
                    
                    <input type="hidden" name="atividade_id" value="<?php echo $dados['atividade']->id_atividade; ?>">
                    
                    <div>
                        <label for="texto_resposta" class="block text-sm font-medium text-gray-700 mb-2">Sua resposta:</label>
                        <textarea 
                            id="texto_resposta"
                            name="texto_resposta" 
                            rows="8"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Escreva sua reflexão ou resposta aqui..."
                            required
                        ></textarea>
                    </div>

                    <div class="mt-6 text-right">
                        <button 
                            type="submit" 
                            class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Enviar Atividade
                        </button>
                    </div>
                </form>
            
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