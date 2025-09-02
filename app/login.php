<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Escolink | Login</title>

</head>

<body class="flex">

    <!-- Login (Left) -->
    <div class="h-screen w-[50%] border-2 border-black">

        <div class="flex items-center gap-[20px] mt-[20px] ml-[20px]">

            <img src="./assets/img/logo-escolink.png" alt="escolink">

            <span class="text-[20px]">Escolink</span>

        </div>

        <h1>Bem vindo de volta</h1>

        <form class="flex flex-col justify-center w-[350px]" action="#">

            <div class="flex flex-col mb-5">
                <label class="mb-2" for="login">Login</label>
                <input class="border-1 border-black rounded p-1" type="text" id="login" name="login">
            </div>

            <div class="flex flex-col mb-5">
                <label class="mb-2" for="senha">Senha</label>
                <input class="border-1 border-black rounded p-1" type="password" id="senha" name="senha">
            </div>

            <a class="text-blue-500 underline" href="#">Esqueci a senha</a>

            <input class="bg-[#022E51] text-white" type="button" value="Entrar">

        </form>

    </div>

    <!-- Imagem (Right) -->
    <div class="h-screen w-[50%] border-2 border-black">



    </div>
    
</body>

</html>