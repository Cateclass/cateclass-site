<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>São Benedito | Cadastro</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">

        <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Criar Conta</h2>

        <form action="/cateclass-site/app/registrar" method="post" class="space-y-5">

            <!-- Exibir erro -->
            <?php if (isset($dados['erro'])): ?>
                <p class="text-red-600 bg-red-100 border border-red-300 p-2 rounded text-center">
                    <?= htmlspecialchars($dados['erro']); ?>
                </p>
            <?php endif; ?>

            <!-- Nome -->
            <div>
                <label for="nome" class="block text-gray-700 font-medium mb-1">Nome completo</label>
                <input type="text" name="nome" id="nome"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Digite seu nome" required>
            </div>

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
                    placeholder="Crie uma senha" required>
            </div>

            <!-- Função -->
            <div>
                <label for="funcao" class="block text-gray-700 font-medium mb-1">Função</label>
                <select name="funcao" id="funcao"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-400 outline-none"
                    required>
                    <option value="">--Selecione a função--</option>
                    <option value="catequizando">Catequizando</option>
                    <option value="catequista">Catequista</option>
                </select>
            </div>

            <!-- Botão -->
            <button type="submit" name="register"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Cadastrar
            </button>

            <!-- Link de login -->
            <p class="text-center text-gray-700">
                Já tem uma conta?
                <a href="/login" class="text-blue-600 hover:underline font-semibold">
                    Fazer login
                </a>
            </p>
        </form>

    </div>

</body>
</html>
