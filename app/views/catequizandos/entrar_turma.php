<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catequizando | Entrar na turma</title>

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- W3 Icons -->
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

            <div class="bg-white rounded-lg shadow-md max-w-sm p-6">
                <div class="text-center">
                    <i class="material-icons text-5xl mb-4 text-green-600">key</i> </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2 text-center">Entrar na turma</h3>
                <p class="text-base text-gray-700 mb-4 text-center">Peça o código da turma para seu catequista e insira-o aqui</p>
                
                <form action="" method="POST">
                    <input 
                      type="text" 
                      name="codigo_turma" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-300" 
                      placeholder="Código de 6 dígitos"
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
        
        </div> </main>

    <script>
    // Espera o documento carregar
    document.addEventListener('DOMContentLoaded', () => {

        // Pega os elementos pelo ID
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose = document.getElementById('menu-close');

        // Quando clicar no botão "Hambúrguer" (menu-toggle)
        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                // Adiciona a classe 'translate-x-0', que sobrepõe o '-translate-x-full'
                // e faz a sidebar aparecer.
                sidebar.classList.add('translate-x-0');
            });
        }

        // Quando clicar no botão "X" (menu-close)
        if (menuClose) {
            menuClose.addEventListener('click', () => {
                // Remove a classe 'translate-x-0', fazendo a sidebar
                // voltar ao estado padrão '-translate-x-full' (escondida).
                sidebar.classList.remove('translate-x-0');
            });
        }

        });
    </script>
</body>
</html>