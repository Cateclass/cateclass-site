<?php

require_once "models/conexao.class.php";
require_once "models/TurmaDAO.class.php";
require_once "models/AtividadeDAO.class.php";
require_once "models/EtapaDAO.class.php";
require_once "models/Turma.class.php";
require_once "models/Atividade.class.php";
require_once "models/CatequizandoDAO.class.php";

class CatequistaController
{
    private function checarLogin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'catequista') {
            header('Location: /cateclass-site/app/login');
            exit;
        }
        return $_SESSION['usuario_id'];
    }

    public function home()
    {
        $this->checarLogin();
        header('Location: /cateclass-site/app/catequista/turmas');
        exit;
    }

    public function turmas()
    {
        $catequistaId = $this->checarLogin();
        
        $turmaDAO = new TurmaDAO();
        $listaTurmas = $turmaDAO->getTurmasDoCatequista($catequistaId);

        $dados = [];
        $dados['turmas'] = $listaTurmas;

        if (isset($_SESSION['flash_message'])) {
            $dados['mensagem'] = $_SESSION['flash_message'];
            $dados['mensagem_tipo'] = $_SESSION['flash_type'] ?? 'erro';
            unset($_SESSION['flash_message']);
            unset($_SESSION['flash_type']);
        }

        require_once "views/catequistas/turmas.php";
    }

    public function atividades()
    {
        $catequistaId = $this->checarLogin();
        
        $atividadeDAO = new AtividadeDAO();
        
        $listaAtividades = $atividadeDAO->getAtividadesDoCatequista($catequistaId);
        $stats = $atividadeDAO->getStatsAtividadesDoCatequista($catequistaId);

        $dados = [];
        $dados['lista_atividades'] = $listaAtividades;
        $dados['stats'] = $stats;

        require_once "views/catequistas/atividades.php";
    }

    public function novaTurmaForm()
    {
        $catequistaId = $this->checarLogin();
        
        $etapaDAO = new EtapaDAO();
        $listaEtapas = $etapaDAO->buscarTodas();
        
        $dados = [];
        $dados['etapas'] = $listaEtapas;

        if (isset($_SESSION['flash_message'])) {
            $dados['mensagem'] = $_SESSION['flash_message'];
            $dados['mensagem_tipo'] = $_SESSION['flash_type'] ?? 'erro';
            unset($_SESSION['flash_message']);
            unset($_SESSION['flash_type']);
        }

        require_once "views/catequistas/formNovaTurma.php";
    }

    public function criarTurma()
    {
        $catequistaId = $this->checarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cateclass-site/app/catequista/turmas/nova');
            exit;
        }

        $novaTurma = new Turma();
        $novaTurma->setNomeTurma(trim($_POST['nome_turma']));
        $novaTurma->setEtapaId(trim($_POST['etapa_id']));
        $novaTurma->setTipoTurma(trim($_POST['tipo_turma']));
        $novaTurma->setDataInicio(trim($_POST['data_inicio']));
        $novaTurma->setDataTermino(empty($_POST['data_termino']) ? null : trim($_POST['data_termino']));
        $novaTurma->setCatequistaId($catequistaId);

        $turmaDAO = new TurmaDAO();
        $resultado = $turmaDAO->inserirTurma($novaTurma);

        if ($resultado === "Sucesso") {
            $_SESSION['flash_message'] = "Turma criada com sucesso!";
            $_SESSION['flash_type'] = "sucesso";
            header('Location: /cateclass-site/app/catequista/turmas');
        } else {
            $_SESSION['flash_message'] = $resultado;
            $_SESSION['flash_type'] = "erro";
            header('Location: /cateclass-site/app/catequista/turmas/nova');
        }
        exit;
    }

    public function novaAtividadeForm()
    {
        $catequistaId = $this->checarLogin();
        
        $turmaDAO = new TurmaDAO();
        $listaTurmas = $turmaDAO->getTurmasDoCatequista($catequistaId);
        
        $dados = [];
        $dados['turmas'] = $listaTurmas;

        if (isset($_SESSION['flash_message'])) {
            $dados['mensagem'] = $_SESSION['flash_message'];
            $dados['mensagem_tipo'] = $_SESSION['flash_type'] ?? 'erro';
            unset($_SESSION['flash_message']);
            unset($_SESSION['flash_type']);
        }

        require_once "views/catequistas/formNovaAtividade.php";
    }

    public function criarAtividade()
    {
        $catequistaId = $this->checarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cateclass-site/app/catequista/atividades/nova');
            exit;
        }

        $novaAtividade = new Atividade();
        $novaAtividade->setTitulo(trim($_POST['titulo']));
        $novaAtividade->setDescricao(trim($_POST['descricao']));
        $novaAtividade->setTurmaId(trim($_POST['turma_id']));
        $novaAtividade->setTipo(trim($_POST['tipo']));
        $novaAtividade->setDataEntrega(empty($_POST['data_entrega']) ? null : trim($_POST['data_entrega']));

        $atividadeDAO = new AtividadeDAO();
        $resultado = $atividadeDAO->inserirAtividade($novaAtividade);

        if ($resultado === "sucesso") {
            $_SESSION['flash_message'] = "Atividade criada com sucesso!";
            $_SESSION['flash_type'] = "sucesso";
            header('Location: /cateclass-site/app/catequista/atividades');
        } else {
            $_SESSION['flash_message'] = $resultado;
            $_SESSION['flash_type'] = "erro";
            header('Location: /cateclass-site/app/catequista/atividades/nova');
        }
        exit;
    }

    public function verTurma()
    {
        $catequistaId = $this->checarLogin();
        
        if (!isset($_GET['id'])) {
            header('Location: /cateclass-site/app/catequista/turmas');
            exit;
        }
        $turmaId = (int)$_GET['id'];

        $turmaDAO = new TurmaDAO();
        $turma = $turmaDAO->buscarTurmaPorId($turmaId, $catequistaId);

        if (!$turma) {
            $_SESSION['flash_message'] = "Turma não encontrada ou não pertence a você.";
            $_SESSION['flash_type'] = "erro";
            header('Location: /cateclass-site/app/catequista/turmas');
            exit;
        }

        $atividadeDAO = new AtividadeDAO();
        $listaAtividades = $atividadeDAO->getAtividadesDaTurma($turmaId);
        
        $catequizandoDAO = new CatequizandoDAO();
        $listaCatequizandos = $catequizandoDAO->getCatequizandosDaTurma($turmaId);

        $dados = [];
        $dados['turma'] = $turma;
        $dados['atividades'] = $listaAtividades;
        $dados['catequizandos'] = $listaCatequizandos;

        require_once "views/catequistas/verTurma.php";
    }
}