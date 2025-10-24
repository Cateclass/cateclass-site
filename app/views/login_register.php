<?php

session_start();
require_once 'config.php';

// Se clicou no botão de cadastro
if(isset($_POST['register'])) {

    // Atribuindo variáveis
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $funcao = $_POST['funcao'];

    // Se for catequizando
    if($funcao === "catequizando") {

        $checkEmail = $conn->query("SELECT email FROM catequizandos WHERE email = '$email'");
        // Verificando se esse email já está cadastrado
        if ($checkEmail->num_rows > 0) {
            $_SESSION['register_error'] = 'Email já cadastrado!';
            $_SESSION['active_form'] = 'register';
        } 
        // Se esse email não for cadastrado, ele cadastra
        else
        {
            $conn->query("INSERT INTO catequizandos (nome, email, senha, funcao) VALUES ('$nome', '$email', '$senha', '$funcao')");
        }
        
        // Redirecionando para a página do login
        header("Location: login.php");
    }

    // Se for catequista
    if($funcao === "catequista") {

        $checkEmail = $conn->query("SELECT email FROM catequistas WHERE email = '$email'");
        // Verificando se esse email já está cadastrado
        if ($checkEmail->num_rows > 0) {
            $_SESSION['register_error'] = 'Email já cadastrado!';
            $_SESSION['active_form'] = 'register';
        } 
        // Se esse email não for cadastrado, ele cadastra
        else 
        {
            $conn->query("INSERT INTO catequistas (nome, email, senha, funcao) VALUES ('$nome', '$email', '$senha', '$funcao')");
        }
        
        // Redirecionando para a página do login
        header("Location: login.php");
    }

    // Se for responsavel
    if($funcao === "responsavel") {

        $checkEmail = $conn->query("SELECT email FROM responsaveis WHERE email = '$email'");
        // Verificando se esse email já está cadastrado
        if ($checkEmail->num_rows > 0) {
            $_SESSION['register_error'] = 'Email já cadastrado!';
            $_SESSION['active_form'] = 'register';
        } 
        // Se esse email não for cadastrado, ele cadastra
        else 
        {
            $conn->query("INSERT INTO responsaveis (nome, email, senha, funcao) VALUES ('$nome', '$email', '$senha', '$funcao')");
        }
        
        // Redirecionando para a página do login
        header("Location: login.php");
    }

    // Se for coordenador
    if($funcao === "coordenador") {

        $checkEmail = $conn->query("SELECT email FROM coordenadores WHERE email = '$email'");
        // Verificando se esse email já está cadastrado
        if ($checkEmail->num_rows > 0) {
            $_SESSION['register_error'] = 'Email já cadastrado!';
            $_SESSION['active_form'] = 'register';
        } 
        // Se esse email não for cadastrado, ele cadastra
        else 
        {
            $conn->query("INSERT INTO coordenadores (nome, email, senha, funcao) VALUES ('$nome', '$email', '$senha', '$funcao')");
        }
        
        // Redirecionando para a página do login
        header("Location: login.php");
    }

    header("Location: login.php");
    exit();
}

// Se clicou no botão de login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];

    if ($funcao === "catequizando") {

        $result = $conn->query("SELECT * FROM catequizandos WHERE email = '$email'");

        // Verificando se o email usado para o login existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificando se as senhas estão certas
            if(password_verify($senha, $user['senha'])) {

                // Armazenando nome e email na variável de sessão
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $user['email'];

                // Redirecionamento para a página do usuário
                header("Location: catequizando/dashboard.php");
                exit();
            }
        }

    }

    if ($funcao === "catequista") {

        $result = $conn->query("SELECT * FROM catequistas WHERE email = '$email'");

        // Verificando se o email usado para o login existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificando se as senhas estão certas
            if(password_verify($senha, $user['senha'])) {

                // Armazenando nome e email na variável de sessão
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $user['email'];

                // Redirecionamento para a página do usuário
                header("Location: catequista/dashboard.php");
                exit();
            }
        }
        
    }

    if ($funcao === "responsavel") {

        $result = $conn->query("SELECT * FROM responsaveis WHERE email = '$email'");

        // Verificando se o email usado para o login existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificando se as senhas estão certas
            if(password_verify($senha, $user['senha'])) {

                // Armazenando nome e email na variável de sessão
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $user['email'];

                // Redirecionamento para a página do usuário
                header("Location: responsavel/dashboard.php");
                exit();
            }
        }
        
    }

    if ($funcao === "coordenador") {

        $result = $conn->query("SELECT * FROM coordenadores WHERE email = '$email'");

        // Verificando se o email usado para o login existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificando se as senhas estão certas
            if(password_verify($senha, $user['senha'])) {

                // Armazenando nome e email na variável de sessão
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $user['email'];

                // Redirecionamento para a página do usuário
                header("Location: coordenador/dashboard.php");
                exit();
            }
        }
        
    }

    // Se o login não funcionar
    $_SESSION['login_error'] = "Email ou senha incorretos";
    $_SESSION['active_form'] = "login";
    header("Location: login.php");
    exit();
}

?>