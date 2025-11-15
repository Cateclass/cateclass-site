<?php

require_once "models/conexao.class.php";
require_once "models/TurmaDAO.class.php";
require_once "models/AtividadeDAO.class.php";
require_once "models/EtapaDAO.class.php";
require_once "models/Turma.class.php";
require_once "models/Atividade.class.php";
require_once "models/CatequizandoDAO.class.php";
require_once "models/RespostaDAO.class.php";

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
        $novaAtividade->setDescricao(empty($_POST['descricao']) ? null : trim($_POST['descricao']));
        $novaAtividade->setDataEntrega(empty($_POST['data_entrega']) ? null : trim($_POST['data_entrega']));
        $novaAtividade->setTipo(trim($_POST['tipo']));
        $novaAtividade->setTipoEntrega(trim($_POST['tipo_entrega']));
        $novaAtividade->setTurmaId((int)$_POST['turma_id']);
        
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

    public function verEntregas($atividadeId)
    {
        $catequistaId = $this->checarLogin();

        $atividadeDAO = new AtividadeDAO();
        $respostaDAO = new RespostaDAO();

        // Busca os dados da atividade
        $atividade = $atividadeDAO->buscarAtividadeParaCatequista($atividadeId, $catequistaId);

        // Se a atividade não for desse catequista ou não encontrar ela redireciona para a tela de atividades com a msg de erro
        if (!$atividade) {
            $_SESSION['flash_message'] = "Atividade não encontrada ou não pertence a você.";
            $_SESSION['flash_type'] = "erro";
            header('Location: /cateclass-site/app/catequista/atividades');
            exit;
        }

        // Busca a lista de respostas para esta atividade
        $respostas = $respostaDAO->buscarRespostasDaAtividade($atividadeId);

        // Prepara os dados para a view
        $dados = [
            'atividade' => $atividade,
            'respostas' => $respostas
        ];

        // Carrega a view
        require_once "views/catequistas/verEntregas.php";
    }

    public function corrigirForm($respostaId)
    {
        $catequistaId = $this->checarLogin();

        $respostaDAO = new RespostaDAO();
        $atividadeDAO = new AtividadeDAO();

        // Busca a resposta que o catequista quer corrigir
        $resposta = $respostaDAO->buscarRespostaUnicaPorId($respostaId);

        if (!$resposta) {
            // Se a resposta não existe, volta para o dashboard
            header('Location: /cateclass-site/app/catequista');
            exit;
        }

        // Verifica se a atividade desta resposta pertence ao catequista logado
        $atividade = $atividadeDAO->buscarAtividadeParaCatequista($resposta->atividade_id, $catequistaId);
        
        if (!$atividade) {
            // Se não pertence, redireciona com erro
            $_SESSION['flash_message'] = "Você não tem permissão para corrigir esta atividade.";
            $_SESSION['flash_type'] = "erro";
            header('Location: /cateclass-site/app/catequista');
            exit;
        }

        // Prepara os dados para a view
        $dados = [
            'resposta' => $resposta,
            'atividade' => $atividade 
        ];

        // Carrega a view
        require_once "views/catequistas/formCorrecao.php";
    }

    public function salvarCorrecao()
    {
        $catequistaId = $this->checarLogin();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cateclass-site/app/catequista');
            exit;
        }

        // Pega os dados do formulário
        $respostaId = $_POST['id_resposta'];
        $atividadeId = $_POST['id_atividade']; 
        $comentario = trim($_POST['comentario']);

        $respostaDAO = new RespostaDAO();
        $sucesso = $respostaDAO->salvarFeedback($respostaId, $comentario);

        if ($sucesso) {
            $_SESSION['flash_message'] = "Feedback enviado com sucesso!";
            $_SESSION['flash_type'] = "sucesso";
        } else {
            $_SESSION['flash_message'] = "Erro ao salvar o feedback.";
            $_SESSION['flash_type'] = "erro";
        }

        // Redireciona de volta para a tela de "Ver Entregas"
        header('Location: /cateclass-site/app/catequista/atividade/' . $atividadeId . '/entregas');
        exit;
    }

    public function editarForm($atividadeId)
    {
        $catequistaId = $this->checarLogin();
        $atividadeDAO = new AtividadeDAO();
        $turmaDAO = new TurmaDAO();

        // Busca a atividade
        $atividade = $atividadeDAO->buscarAtividadeParaCatequista($atividadeId, $catequistaId);

        if (!$atividade) {
            $_SESSION['flash_message'] = "Atividade não encontrada.";
            $_SESSION['flash_type'] = "erro";
            header('Location: /cateclass-site/app/catequista/atividades');
            exit;
        }

        // Busca as turmas do catequista (para o dropdown)
        $turmas = $turmaDAO->getTurmasDoCatequista($catequistaId);
        
        $dados = [
            'atividade' => $atividade,
            'turmas' => $turmas
        ];

        // Carrega a view de edição
        require_once "views/catequistas/formEditarAtividade.php";
    }

    public function atualizar()
    {
        $catequistaId = $this->checarLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cateclass-site/app/catequista/atividades');
            exit;
        }

        // Pega os dados do POST
        $atividade = new Atividade();
        $atividade->setIdAtividade((int)$_POST['id_atividade']);
        $atividade->setTitulo(trim($_POST['titulo']));
        $atividade->setDescricao(trim($_POST['descricao']));
        $atividade->setDataEntrega(empty($_POST['data_entrega']) ? null : trim($_POST['data_entrega']));
        $atividade->setTipo(trim($_POST['tipo']));
        $atividade->setTipoEntrega(trim($_POST['tipo_entrega']));
        $atividade->setTurmaId((int)$_POST['turma_id']);

        // Chama o DAO para dar UPDATE
        $atividadeDAO = new AtividadeDAO();
        $resultado = $atividadeDAO->atualizarAtividade($atividade, $catequistaId);

        if ($resultado === "sucesso") {
            $_SESSION['flash_message'] = "Atividade atualizada com sucesso!";
            $_SESSION['flash_type'] = "sucesso";
        } else {
            $_SESSION['flash_message'] = $resultado;
            $_SESSION['flash_type'] = "erro";
        }

        // Redireciona de volta para a lista de atividades
        header('Location: /cateclass-site/app/catequista/atividades');
        exit;
    }

    public function excluir()
    {
        $catequistaId = $this->checarLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cateclass-site/app/catequista/atividades');
            exit;
        }

        $atividadeId = (int)$_POST['id_atividade'];

        $atividadeDAO = new AtividadeDAO();
        $resultado = $atividadeDAO->deletarAtividade($atividadeId, $catequistaId);

        if ($resultado === "sucesso") {
            $_SESSION['flash_message'] = "Atividade excluída com sucesso.";
            $_SESSION['flash_type'] = "sucesso";
        } else {
            $_SESSION['flash_message'] = $resultado;
            $_SESSION['flash_type'] = "erro";
        }

        header('Location: /cateclass-site/app/catequista/atividades');
        exit;
    }

    public function editarTurmaForm($turmaId)
    {
        $catequistaId = $this->checarLogin();
        $turmaDAO = new TurmaDAO();
        $etapaDAO = new EtapaDAO();

        $turma = $turmaDAO->buscarTurmaPorId($turmaId, $catequistaId);

        if (!$turma) {
            $_SESSION['flash_message'] = "Turma não encontrada.";
            $_SESSION['flash_type'] = "erro";
            header('Location: /cateclass-site/app/catequista/turmas');
            exit;
        }

        $etapas = $etapaDAO->buscarTodas();
        
        $dados = [
            'turma' => $turma,
            'etapas' => $etapas
        ];

        require_once "views/catequistas/formEditarTurma.php";
    }

    public function atualizarTurma()
    {
        $catequistaId = $this->checarLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cateclass-site/app/catequista/turmas');
            exit;
        }

        $turma = new Turma();
        $turma->setIdTurma((int)$_POST['id_turma']);
        $turma->setNomeTurma(trim($_POST['nome_turma']));
        $turma->setTipoTurma(trim($_POST['tipo_turma']));
        $turma->setDataInicio(trim($_POST['data_inicio']));
        $turma->setDataTermino(empty($_POST['data_termino']) ? null : trim($_POST['data_termino']));
        $turma->setEtapaId((int)$_POST['etapa_id']);
        $turma->setCatequistaId($catequistaId);

        $turmaDAO = new TurmaDAO();
        $resultado = $turmaDAO->atualizarTurma($turma);

        if ($resultado === "sucesso") {
            $_SESSION['flash_message'] = "Turma atualizada com sucesso!";
            $_SESSION['flash_type'] = "sucesso";
        } else {
            $_SESSION['flash_message'] = $resultado;
            $_SESSION['flash_type'] = "erro";
        }

        header('Location: /cateclass-site/app/catequista/turmas');
        exit;
    }

    public function excluirTurma()
    {
        $catequistaId = $this->checarLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cateclass-site/app/catequista/turmas');
            exit;
        }

        $turmaId = (int)$_POST['id_turma'];

        $turmaDAO = new TurmaDAO();
        $resultado = $turmaDAO->deletarTurma($turmaId, $catequistaId);

        if ($resultado === "sucesso") {
            $_SESSION['flash_message'] = "Turma e todos os seus dados (atividades, respostas, alunos) foram excluídos com sucesso.";
            $_SESSION['flash_type'] = "sucesso";
        } else {
            $_SESSION['flash_message'] = $resultado;
            $_SESSION['flash_type'] = "erro";
        }

        header('Location: /cateclass-site/app/catequista/turmas');
        exit;
    }
}