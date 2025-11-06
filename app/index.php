<?php

require_once "controllers/InicioController.php";
require_once "controllers/CatequizandoController.php";
require_once "controllers/UsuarioController.php";
require_once "controllers/LoginController.php";

// se a URL existir, pega. Se não fica vazia ""
$url = isset($_GET['url']) ? $_GET['url'] : '';

// limpa barras extras
$urlLimpa = trim($url, '/');

switch($urlLimpa)
{
    case '':
        $controller = new InicioController();
        $controller->inicio();
    break;

    case 'cadastro':
        $controller = new UsuarioController();
        $controller->cadastro();
    break;

    case 'registrar':
        $controller = new UsuarioController();
        $controller->salvar();
    break;

    case 'login':
        $controller = new LoginController();
        $controller->login();
    break;

    case 'autenticar':
        $controller = new LoginController();
        $controller->autenticar();
    break;

    case 'catequizando':
        $controller = new CatequizandoController();
        $controller->home();
    break;

    case 'catequizando/atividades':
        $controller = new CatequizandoController();
        $controller->atividades();
    break;

    default:
        http_response_code(404); // Define o código de status 404
        echo "<h1>Erro 404 - Página não encontrada</h1>";
    break;
}