<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>São Benedito | Login</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 relative">

        <!-- Mensagem de sucesso -->
        <?php if (isset($_SESSION['flash_message'])): ?>
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <?php echo $_SESSION['flash_message']; ?>
            </div>
            <?php unset($_SESSION['flash_message']); ?>
        <?php endif; ?>

        <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Login</h2>

        <form action="/cateclass-site/app/autenticar" method="post" class="space-y-5">
            
            <!-- Erro -->
            <?php if (isset($dados['erro'])): ?>
                <p class="text-red-600 bg-red-100 border border-red-300 p-2 rounded text-center">
                    <?= htmlspecialchars($dados['erro']); ?>
                </p>
            <?php endif; ?>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Digite seu email" required>
            </div>

            <!-- Senha -->
            <div>
                <label for="senha" class="block text-gray-700 font-medium mb-1">Senha</label>
                <input type="password" name="senha" id="senha"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Digite sua senha" required>
            </div>

            <!-- Botão -->
            <button type="submit" name="login"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Entrar
            </button>

            <!-- Link cadastro -->
            <p class="text-center text-gray-700">
                Não tem uma conta? 
                <a href="/cateclass-site/app/cadastro" class="text-blue-600 hover:underline font-semibold">
                    Criar conta
                </a>
            </p>
        </form>
    </div>

</body>
</html>
