<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Escolink | Login</title>

    <style>

        .password-wrapper {
            position: relative;
        }

        .password-input {
            display: block;
        }

        .password-icon {
            position: absolute;
            right: 10px;
            top: 10px;
        }

    </style>

</head>

<body class="flex">

    <!-- Login (Left) -->
    <div 
        class="
        h-screen w-[50%]
        
        max-md:w-[100%]"
    >

        <div>

            <!-- Consertar área do click -->
            <a class="flex items-center gap-[20px] mt-[20px] ml-[20px] w-fit" href="../">

                <img src="./assets/img/logo-escolink.png" alt="escolink">

                <span class="text-[20px]">Escolink</span>

            </a>

        </div>

        <!-- Formulário -->
        <div class="flex flex-col justify-center items-center h-100">

            <h1 class="text-[36px] font-bold mb-[20px]" id="teste">Bem vindo de volta</h1>

            <form class="flex flex-col justify-center w-[350px]" action="#">

                <!-- Input login -->
                <div class="flex flex-col mb-5">

                    <label class="mb-2" for="login">Login</lafbel>

                    <input class="w-[350px] border-1 border-gray-500 rounded p-1" type="text" id="login" name="login">

                    <p class="z-40 text-red-500 hidden -mb-2" id="msg-login-null">** Preencha o login</p>

                </div>

                <!-- Input senha -->
                <div class="flex flex-col mb-5 relative">

                    <label class="mb-2" for="senha">Senha</label>

                    <!-- Password wrapper -->
                    <div class="password-wrapper">
                        <input class="password-input block w-[350px] border-1 border-gray-500 rounded p-1" type="password" id="password" name="senha">
                        <i class="absolute right-[10px] top-[5px] cursor-pointer fa fa-eye password-icon" id="togglepassword"></i>
                    </div>

                    <p class="text-red-500 hidden" id="msg-password-null">** Preencha a senha</p>

                </div>

                <!-- Link esqueci a senha -->
                <a class="text-blue-500 underline text-end mb-5" href="#">Esqueci a senha</a>

                <!-- Botão entrar -->
                <input class="bg-[#022E51] text-white rounded p-1" type="button" onclick="inputValidation()" value="Entrar">

            </form>

        </div>

    </div>

    <!-- Imagem (Right) -->
    <div 
        class="
        bg-[url('./assets/img/pintura.jpg')] bg-cover bg-center w-[50%]

        max-md:hidden
        "
    ></div>

    <script>

        const togglepassword = document.querySelector("#togglepassword");

        const password = document.querySelector("#password");

        const login = document.querySelector("#login");

        const msgLoginNull = document.querySelector("#msg-login-null");

        const msgPasswordNull = document.querySelector("#msg-password-null");

        togglepassword.addEventListener("click", function (e) {

            const type = password.getAttribute("type") === "password" ? "text" : "password";

            password.setAttribute("type", type);

            this.classList.toggle("fa-eye-slash");

        });

        function inputValidation() {

            if (login.value == '') {
                msgLoginNull.classList.toggle("hidden");
            }

            if (password.value == '') {
                msgPasswordNull.classList.toggle("hidden");
            }

        }

    </script>
    
</body>

</html>