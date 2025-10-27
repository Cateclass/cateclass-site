<?php
session_start();
require_once 'config.php';

// Se clicou no botão de cadastro
if (isset($_POST['register'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $funcao = $_POST['funcao'];

    // Mapeia o nome da tabela com base na função
    $tabelas = [
        "catequizando" => "catequizandos",
        "catequista" => "catequistas",
        "responsavel" => "responsaveis",
        "coordenador" => "coordenadores"
    ];

    if (isset($tabelas[$funcao])) {
        $tabela = $tabelas[$funcao];

        // Verifica se o e-mail já existe
        $checkEmail = $conn->prepare("SELECT email FROM $tabela WHERE email = :email");
        $checkEmail->bindParam(':email', $email);
        $checkEmail->execute();

        if ($checkEmail->rowCount() > 0) {
            $_SESSION['register_error'] = 'Email já cadastrado!';
            $_SESSION['active_form'] = 'register';
        } else {
            // Insere novo registro
            $stmt = $conn->prepare("INSERT INTO $tabela (nome, email, senha, funcao) VALUES (:nome, :email, :senha, :funcao)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':funcao', $funcao);
            $stmt->execute();
        }

        header("Location: login.php");
        exit();
    }
}

// Se clicou no botão de login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];

    $tabelas = [
        "catequizando" => "catequizandos",
        "catequista" => "catequistas",
        "responsavel" => "responsaveis",
        "coordenador" => "coordenadores"
    ];

    if (isset($tabelas[$funcao])) {
        $tabela = $tabelas[$funcao];

        // Busca o usuário
        $stmt = $conn->prepare("SELECT * FROM $tabela WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica senha
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $user['email'];

                header("Location: {$funcao}/dashboard.php");
                exit();
            }
        }
    }

    // Se o login falhar
    $_SESSION['login_error'] = "Email ou senha incorretos";
    $_SESSION['active_form'] = "login";
    header("Location: login.php");
    exit();
}
?>
