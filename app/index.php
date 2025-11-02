<?php

// echo "Home";

// echo "<a href='./views/login.php'>Login</a>";

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/projetos/cateclass-site/app/':
        require_once "views/inicio.php";
    break;

    case '/pessoa':
        echo "listagem de pessoas";
    break;

    case '/pessoa/form':
        echo "formulário para salvar pessoa";
    break;

    default:
        echo "Erro 404";
    break;
}