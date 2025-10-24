<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">

    <title>São Benedito | Login</title>

</head>

<body>

    <div class="container">
        <!-- Form Fazer Login -->
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <select name="funcao" required>
                    <option value="">--Selecione a função--</option>
                    <option value="catequizando">Catequizando</option>
                    <option value="catequista">Catequista</option>
                    <option value="responsavel">Responsavel</option>
                    <option value="coordenador">Coordenador</option>
                </select>
                <button type="submit" name="login">Login</button>
                <p>Não tem uma conta? <a href="#" onclick="showForm('register-form')">Criar conta</a></p>
            </form>
        </div>

        <!-- Form Criar Conta -->
        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Criar conta</h2>
                <?= showError($errors['register']); ?>
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <select name="funcao" required>
                    <option value="">--Selecione a função--</option>
                    <option value="catequizando">Catequizando</option>
                    <option value="catequista">Catequista</option>
                    <option value="responsavel">Responsavel</option>
                    <option value="coordenador">Coordenador</option>
                </select>
                <button type="submit" name="register">Cadastrar</button>
                <p>Já tem uma conta? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>

    <script>

        function showForm(formId) {
            document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
            document.getElementById(formId).classList.add("active");
        }

    </script>
    
</body>

</html>