<?php 
    require_once "models/Conexao.class.php";
    require_once "models/AtividadeDAO.class.php";
    require_once "models/TurmaDAO.class.php";
    require_once "models/Resposta.class.php";
    require_once "models/RespostaDAO.class.php";

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

        public function perfil()
        {
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'catequizando') {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            require_once "views/catequizandos/perfil.php";
        }

        public function atividades()
        {
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'catequizando') {
                header('Location: /cateclass-site/app/login');
                exit;
            }
            
            $atividadeDAO = new AtividadeDAO();
            $catequizandoId = $_SESSION['usuario_id'];
            $filtro = $_GET['filtro'] ?? 'todas';

            $totalAtividades = $atividadeDAO->countAtividadesDoCatequizando($catequizandoId);
            $concluidas = $atividadeDAO->countAtividadesConcluidas($catequizandoId);
            $pendentes = max(0, $totalAtividades - $concluidas);
            
            $listaAtividades = $atividadeDAO->getAtividadesDoCatequizando($catequizandoId, $filtro);

            $dados = [];
            $dados['stats'] = [
                'total' => $totalAtividades,
                'pendentes' => $pendentes,
                'concluidas' => $concluidas,
                'naoEnviadas' => $pendentes 
            ];
            $dados['lista_atividades'] = $listaAtividades;
            $dados['filtro_ativo'] = $filtro;

            if (isset($_SESSION['flash_message'])) {
                $dados['mensagem'] = $_SESSION['flash_message'];
                $dados['mensagem_tipo'] = $_SESSION['flash_type'] ?? 'info';
                unset($_SESSION['flash_message']);
                unset($_SESSION['flash_type']);
            }
            
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

        public function verAtividade()
        {
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'catequizando') {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
                header('Location: /cateclass-site/app/catequizando/atividades');
                exit;
            }

            $atividadeId = (int)$_GET['id'];
            $catequizandoId = (int)$_SESSION['usuario_id'];

            $atividadeDAO = new AtividadeDAO();
            $respostaDAO = new RespostaDAO();

            $atividade = $atividadeDAO->buscarAtividadePorId($atividadeId);
            
            if (!$atividade) {
                header('Location: /cateclass-site/app/catequizando/atividades');
                exit;
            }

            $resposta = $respostaDAO->buscarRespostaDoAluno($atividadeId, $catequizandoId);

            $dados = [
                'atividade' => $atividade,
                'resposta' => $resposta
            ];

                if (isset($_SESSION['flash_message'])) {
                $dados['mensagem'] = $_SESSION['flash_message'];
                $dados['mensagem_tipo'] = $_SESSION['flash_type'] ?? 'info';
                unset($_SESSION['flash_message']);
                unset($_SESSION['flash_type']);
            }

            require_once "views/catequizandos/verAtividade.php";
        }

        public function enviarResposta()
        {
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            $atividadeId = (int)$_POST['atividade_id'];
            $catequizandoId = (int)$_SESSION['usuario_id'];
            $tipoEntrega = trim($_POST['tipo_entrega']);
            $textoResposta = null;

            if ($tipoEntrega == 'texto') {
                $textoResposta = trim($_POST['texto_resposta']);
                if (empty($textoResposta)) {
                    $_SESSION['flash_message'] = "Você não pode enviar uma resposta em branco.";
                    $_SESSION['flash_type'] = "erro";
                    header('Location: /cateclass-site/app/catequizando/atividade?id=' . $atividadeId);
                    exit;
                }
            }

            $resposta = new Resposta();
            $resposta->setAtividadeId($atividadeId);
            $resposta->setCatequizandoId($catequizandoId);
            $resposta->setTexto($textoResposta); 

            $respostaDAO = new RespostaDAO();
            $resultado = $respostaDAO->inserirResposta($resposta);

            if ($resultado === "sucesso") {
                $_SESSION['flash_message'] = "Atividade enviada com sucesso!";
                $_SESSION['flash_type'] = "sucesso";
            } else {
                $_SESSION['flash_message'] = $resultado;
                $_SESSION['flash_type'] = "erro";
            }

            header('Location: /cateclass-site/app/catequizando/atividades');
            exit;
        }

        public function cancelarResposta()
        {
            session_start();
            if (!isset($_SESSION['usuario_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /cateclass-site/app/login');
                exit;
            }

            $respostaId = (int)$_POST['resposta_id'];
            $atividadeId = (int)$_POST['atividade_id'];
            $catequizandoId = (int)$_SESSION['usuario_id'];

            $respostaDAO = new RespostaDAO();
            $resultado = $respostaDAO->deletarResposta($respostaId, $catequizandoId);

            if ($resultado === "sucesso") {
                $_SESSION['flash_message'] = "Envio cancelado. Você pode enviar sua resposta novamente.";
                $_SESSION['flash_type'] = "sucesso";
            } else {
                $_SESSION['flash_message'] = $resultado;
                $_SESSION['flash_type'] = "erro";
            }

            header('Location: /cateclass-site/app/catequizando/atividade?id=' . $atividadeId);
            exit;
        }
    }
?>