<?php 
    require_once "models/Conexao.class.php";
    require_once "models/AtividadeDAO.class.php";
    require_once "models/TurmaDAO.class.php";

    class CatequizandoController
    {
        public function home()
        {
            session_start();

            // verifica se recebeu usuário e se o tipo é catequizando, se não, manda para o login
            if(!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] != 'catequizando')
            {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            // instancia dos DAOs

            $turmaDAO = new TurmaDAO();
            $atividadeDAO = new AtividadeDAO();

            $catequizandoId = $_SESSION['usuario_id'];

            $totalAtividades = $atividadeDAO->countAtividadesDoCatequizando($catequizandoId);
            $concluidas = $atividadeDAO->countAtividadesConcluidas($catequizandoId);
            $pendentes = max(0, $totalAtividades - $concluidas);

            $dados = [];

            // pega o nome da sessão
            $dados['nomeUsuario'] = $_SESSION['usuario_nome'];

            // guarada os numeros dos cards
            $dados['stats'] = [
            'totalTurmas' => $turmaDAO->countTurmasCatequizando($catequizandoId),
            'totalAtividades' => $totalAtividades,
            'pendentes' => $pendentes,
            'concluidas' => $concluidas
            ];

            // guarda lista de turmas 
            $dados['turmas'] = $turmaDAO->getTurmasCatequizando($catequizandoId);

            // carrega a view
            require_once "views/catequizandos/dashboard.php";
        }

        public function atividades()
        {
            // verifica
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'catequizando') {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            // colocar dados aqui depois

            require_once "views/catequizandos/atividades.php";
        }
    }
?>