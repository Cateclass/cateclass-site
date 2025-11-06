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
            // protege a sessão
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'catequizando') {
                header('Location: /cateclass-site/app/login');
                exit;
            }
            
            // instancia
            $atividadeDAO = new AtividadeDAO();
            $catequizandoId = $_SESSION['usuario_id'];

            // lê o sinal da URL, se não tiver nada é todas
            $filtro = $_GET['filtro'] ?? 'todas';

            // busca os dados para os Cards 
            $totalAtividades = $atividadeDAO->countAtividadesDoCatequizando($catequizandoId);
            $concluidas = $atividadeDAO->countAtividadesConcluidas($catequizandoId);
            $pendentes = max(0, $totalAtividades - $concluidas);
            
            // passa o filtro para o DAO
            $listaAtividades = $atividadeDAO->getAtividadesDoCatequizando($catequizandoId, $filtro);

            $dados = [];
            $dados['stats'] = [
                'total' => $totalAtividades,
                'pendentes' => $pendentes,
                'concluidas' => $concluidas,
                'naoEnviadas' => $pendentes 
            ];
            $dados['lista_atividades'] = $listaAtividades;

            // passa o filtro para a view
            $dados['filtro_ativo'] = $filtro;

            require_once "views/catequizandos/atividades.php";
        }

        public function entrarTurmaForm()
        {
            // protege a rota
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'catequizando') {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            // prepara os $dados para exibir msg de erro ou sucesso
            $dados = [];
            if (isset($_SESSION['flash_message'])) {
                $dados['mensagem'] = $_SESSION['flash_message'];
                unset($_SESSION['flash_message']);
            }

            require_once "views/catequizandos/entrar_turma.php";
        }

        public function matricular()
        {
            session_start();

            // protege a rota e verifica se veio algo do POST
            if (!isset($_SESSION['usuario_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            // pega os dados
            $codigoTurma = trim($_POST["codigo_turma"]);
            $catequizandoId = $_SESSION['usuario_id'];

            $turmaDAO = new TurmaDAO();
            $resultado = $turmaDAO->matricularPorCodigo($codigoTurma, $catequizandoId);

            // trata a resposta
            if($resultado === "sucesso")
            {
                $_SESSION['flash_message'] = "Matrícula realizada com sucesso!";
                // redireciona para a dashboard
                header('Location: /cateclass-site/app/catequizando');
            } else
            {
                // deu erro
                $_SESSION['flash_message'] = $resultado; // a msg de erro vem do DAO
                // devolve para o formulario
                header('Location: /cateclass-site/app/catequizando/entrar-turma');
            }
            exit;
        }
    }
?>