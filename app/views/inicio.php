<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts - Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- TailwindCSS CLI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>São Benedito | Início</title>

</head>

<body>

    <header class="flex items-center justify-between p-[20px] px-[100px] border-b-1 border-black">

        <img class="w-[261px]" src="http://localhost/projetos/cateclass-site/app/views/assets/img/logo-no-bg.png" alt="Logo Paróquia São Benedito">

        <nav>

            <ul class="flex gap-[30px] uppercase font-bold">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#sobre">Paróquia</a></li>
                <li><a href="#catequese">catequese</a></li>
            </ul>

        </nav>

    </header>

    <section
        class="
        flex items-center justify-center 
        h-[calc(100vh_-_87px)] bg-cover bg-center relative"
        style="background-image: url('http://localhost/projetos/cateclass-site/app/views/assets/img/igreja-interna.jpg')"
      >
    </section>

    <main class="py-[100px]">

        <!-- Catequese e Crisma -->
        <section class="px-[100px]">

            <h2 class="text-[32px] font-bold uppercase">Catequese e Crisma</h2>

            <a class="bg-[#00ff00] px-[20px] py-[7px] rounded-[30px]" href="views/escolher-login.php">Log In</a>

        </section>

    </main>

</body>

</html>