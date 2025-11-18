<?php

date_default_timezone_set('America/Sao_Paulo');

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

$matches = [];

if (preg_match('/^catequista\/atividade\/(\d+)\/entregas$/', $urlLimpa, $matches)) {
    // URL: /catequista/atividade/5/entregas
    // $matches[1] será "5"
    $controller = new CatequistaController();
    $controller->verEntregas($matches[1]); // chama o método ver entregas
    exit; // para a execução para não cair no switch
}

// rota para mostrar o formulário de correção
if (preg_match('/^catequista\/resposta\/(\d+)\/corrigir$/', $urlLimpa, $matches)) {
    // $matches[1] será o ID da Resposta
    $controller = new CatequistaController();
    $controller->corrigirForm($matches[1]);
    exit;
}

// rota para editar atividade
if (preg_match('/^catequista\/atividade\/(\d+)\/editar$/', $urlLimpa, $matches)) {
    // $matches[1] será o ID da Atividade
    $controller = new CatequistaController();
    $controller->editarForm($matches[1]); 
    exit;
}

// rota para editar as turmas
if (preg_match('/^catequista\/turma\/(\d+)\/editar$/', $urlLimpa, $matches)) {
    $controller = new CatequistaController();
    $controller->editarTurmaForm($matches[1]);
    exit;
}

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

    case 'catequizando/atividade':
        $controller = new CatequizandoController();
        $controller->verAtividade();
    break;

    case 'catequizando/atividade/responder':
        $controller = new CatequizandoController();
        $controller->enviarResposta();
    break;

    case 'catequizando/atividade/cancelar':
        $controller = new CatequizandoController();
        $controller->cancelarResposta();
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
    break;

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

    case 'catequista/atividade/atualizar':
        $controller = new CatequistaController();
        $controller->atualizar(); 
    break;

    case 'catequista/atividade/excluir':
        $controller = new CatequistaController();
        $controller->excluir();
    break;

    case 'catequista/resposta/salvar-correcao':
        $controller = new CatequistaController();
        $controller->salvarCorrecao();
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

    case 'catequista/turma/excluir':
        $controller = new CatequistaController();
        $controller->excluirTurma();
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