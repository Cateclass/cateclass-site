<?php

require_once "controllers/InicioController.php";
require_once "controllers/CatequizandoController.php";
require_once "controllers/UsuarioController.php";
require_once "controllers/LoginController.php";
require_once "controllers/CatequistaController.php";
require_once "controllers/CoordenadorController.php";

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
    
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
    break;

    case 'catequizando':
        $controller = new CatequizandoController();
        $controller->home();
    break;

    case 'catequizando/atividades':
        $controller = new CatequizandoController();
        $controller->atividades();
    break;

    case 'catequizando/entrar-turma':
        $controller = new CatequizandoController();
        $controller->entrarTurmaForm();
    break;

    case 'catequizando/matricular':
        $controller = new CatequizandoController();
        $controller->matricular();
    break;

    case 'catequista':
        $controller = new CatequistaController();
        $controller->home();

    case 'catequista/atividades':
        $controller = new CatequistaController();
        $controller->atividades();
    break;

    case 'catequista/atividades/nova':
        $controller = new CatequistaController();
        $controller->novaAtividadeForm();
    break;

    case 'catequista/atividades/criar':
        $controller = new CatequistaController();
        $controller->criarAtividade();
    break;

    case 'catequista/turmas':
        $controller = new CatequistaController();
        $controller->turmas();
    break;

    case 'catequista/turmas/nova':
        $controller = new CatequistaController();
        $controller->novaTurmaForm();
    break;

    case 'catequista/turmas/criar':
        $controller = new CatequistaController();
        $controller->criarTurma();
    break;

    case 'catequista/turma':
        $controller = new CatequistaController();
        $controller->verTurma();
    break;

    case 'coordenador':
        $controller = new CoordenadorController();
        $controller->home();
    break;

    case 'coordenador/turmas':
        $controller = new CoordenadorController();
        $controller->turmas();
    break;

    case 'coordenador/catequistas':
        $controller = new CoordenadorController();
        $controller->catequistas();
    break;

    case 'coordenador/catequizandos':
        $controller = new CoordenadorController();
        $controller->catequizandos();
    break;

    case 'coordenador/perfil':
        $controller = new CoordenadorController();
        $controller->perfil();
    break;

    default:
        http_response_code(404); // Define o código de status 404
        echo "<h1>Erro 404 - Página não encontrada</h1>";
    break;
}