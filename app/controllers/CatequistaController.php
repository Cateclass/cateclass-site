<?php

require_once "models/TurmaDAO.class.php";
require_once "models/AtividadeDAO.class.php";
require_once "models/Turma.class.php";
require_once "models/Atividade.class.php";

class CatequistaController
{
    private function checarLogin()
    {
        session_start();
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
}