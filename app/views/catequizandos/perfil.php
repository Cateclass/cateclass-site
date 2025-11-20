<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequizandos | Perfil</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .modal {
            background-color: rgba(0, 0, 0, 0.3);
            opacity: 0;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            transition: all 0.3s ease-in-out;
            z-index: -1;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none; /* Importante para não bloquear cliques quando invisível */
        }
        .modal.open {
            opacity: 1;
            z-index: 999;
            pointer-events: all;
        }
        .modal-inner {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
            padding: 15px 25px;
            text-align: center;
            width: 380px;
        }
    </style>
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php' ?>

    <main class="flex-1 p-8 overflow-y-auto">

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Meu Perfil</h1>

        <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl">
            <div class="flex flex-col items-center mb-8">
                <div class="bg-blue-100 w-32 h-32 rounded-full flex items-center justify-center text-4xl text-blue-600 font-bold mb-4">
                    <?php echo strtoupper(substr($_SESSION['usuario_nome'] ?? 'C', 0, 1)); ?>
                </div>
                <h2 class="text-xl font-bold"><?= htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário'); ?></h2>
                <span class="text-blue-500">Catequizando</span>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nome completo</label>
                    <input class="mt-1 w-full p-2 border border-gray-300 rounded-md bg-gray-50" type="text" value="<?= htmlspecialchars($_SESSION['usuario_nome'] ?? ''); ?>" readonly>
                </div>
                
            </div>

            <div class="mt-8 flex flex-col gap-4">
                <!-- Botão Logout (Abre Modal) -->
                <button id="openModal" class="flex items-center justify-center gap-2 w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors">
                    <i class="material-icons">logout</i>
                    Sair do Sistema
                </button>
            </div>
        </div>

        <!-- Modal de Logout -->
        <div class="modal" id="modal">
            <div class="modal-inner">
                <h2 class="text-2xl font-bold mb-2">Sair</h2>
                <p class="text-gray-600 mb-6">Tem certeza que deseja encerrar a sessão?</p>
                <div class="flex justify-between gap-4">
                    <button id="closeModal" class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">
                        Cancelar
                    </button>
                    <a href="/cateclass-site/app/logout" class="flex-1 bg-red-600 text-white py-2 rounded-md hover:bg-red-700 text-center">
                        Sim, Sair
                    </a>
                </div>
            </div>
        </div>

    </main>

    <script>
        const openBtn = document.getElementById("openModal");
        const closeBtn = document.getElementById("closeModal");
        const modal = document.getElementById("modal");

        openBtn.addEventListener("click", () => {
            modal.classList.add("open");
        });

        closeBtn.addEventListener("click", () => {
            modal.classList.remove("open");
        });
        
        // Fechar se clicar fora do modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.remove("open");
            }
        }
    </script>
    
</body>
</html>