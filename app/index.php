<?php

require_once "controllers/InicioController.php";
require_once "controllers/CatequizandoController.php";
require_once "controllers/UsuarioController.php";

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

    // case 'login':
    //     $controller = new UsuarioController();
    //     $controller->login();
    // break;

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