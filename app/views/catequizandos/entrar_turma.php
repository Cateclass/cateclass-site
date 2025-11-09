<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequizando | Entrar na turma</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body class="flex bg-[#E5ECFF] h-screen">

    <?php require_once 'sidebar.php'?>

    <main class="flex-1 flex flex-col">
        
        <header>
            <button id="menu-toggle" class="lg:hidden p-4 text-gray-700">
                <i class="material-icons text-3xl">menu</i>
            </button>
        </header>

        <div class="flex-1 flex justify-center items-center p-[20px]">

            <div class="bg-white rounded-lg shadow-md max-w-sm p-6 w-full">
                <div class="text-center">
                    <i class="material-icons text-5xl mb-4 text-green-600">key</i> 
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2 text-center">Entrar na turma</h3>
                <p class="text-base text-gray-700 mb-4 text-center">Peça o código da turma para seu catequista e insira-o aqui</p>
                
                <form action="/cateclass-site/app/catequizando/matricular" method="POST">
                    
                    <?php if (isset($dados['mensagem'])): ?>
                        <div classid="mensagem" class="p-3 mb-4 text-sm text-center rounded-lg 
                             <?php echo (strpos($dados['mensagem'], 'sucesso') !== false) 
                                   ? 'bg-green-100 text-green-700' 
                                   : 'bg-red-100 text-red-700'; ?>">
                            <?php echo $dados['mensagem']; ?>
                        </div>
                    <?php endif; ?>

                    <input 
                        type="text" 
                        name="codigo_turma" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-300" 
                        placeholder="Código da turma"
                        required
                    >
                    <button 
                        type="submit" 
                        class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-md hover:bg-green-700 transition-colors"
                    > 
                        Entrar
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