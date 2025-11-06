<?php
require_once "models/Conexao.class.php";
require_once "models/UsuarioDAO.class.php";
require_once "models/Usuario.class.php";

    class UsuarioController
    {
        public function cadastro()
        {
            // carrega o form de cadastro
            require_once "views/formCadastro.php";
        }

        public function salvar()
        {
            // pega os dados
            $nome = trim($_POST["nome"]);
            $email = trim($_POST["email"]);
            $senha_digitada = trim($_POST["senha"]);
            $funcao = ($_POST["funcao"]);

            // transforma a senha em hash
            $senha_hash = password_hash($senha_digitada, PASSWORD_DEFAULT);

            // cria novo usuario
            $novoUsuario = new Usuario();
            $novoUsuario->setNome($nome);
            $novoUsuario->setEmail($email);
            $novoUsuario->setSenha($senha_hash);
            $novoUsuario->setTipoFuncao($funcao);

            //chama o model para inserir
            $usuarioDAO = new UsuarioDAO();
            $resultado = $usuarioDAO->inserir($novoUsuario);

            // Decidir o que fazer (feedback para o usuário)
            if (strpos($resultado, 'sucesso') !== false) {
            // Inicia a sessão SÓ PARA ARMAZENAR A MENSAGEM
            session_start();
    
            // Salva a mensagem na sessão
            $_SESSION['flash_message'] = "Usuário criado com sucesso! Faça seu login.";
    
            // Redireciona para a URL LIMPA
            header('Location: /cateclass-site/app/login');
            exit;
            
            } else {
            // Deu erro
            // Prepara a mensagem de erro
            $dados['erro'] = $resultado; // A mensagem de erro veio do DAO

            // Recarrega a view do formulário, passando a mensagem de erro
            require_once "views/formCadastro.php";
            }
        }
    }
?>