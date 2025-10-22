<?php

session_start();
require_once 'config.php';

if(isset($_POST['register'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM coordenador WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email já cadastrado!';
        $_SESSION['active_form'] = 'register';
    } else {
        $conn->query("INSERT INTO coordenador (nome, email, senha, role) VALUES ('$nome', '$email', '$senha', '$role')");
    }

    header("Location: login.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = $conn->query("SELECT * FROM coordenador WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if(password_verify($senha, $user['senha'])) {
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin') {
                header("Location: admin_page.php");
            } else {
                header("Location: user_page.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = "Email ou senha incorretos";
    $_SESSION['active_form'] = "login";
    header("Location: login.php");
    exit();
}

?>