<?php 
    require_once "models/UsuarioDAO.class.php";

    class LoginController
    {
        public function login()
        {
            // carrega a view
            require_once "views/formLogin.php";
        }

        public function autenticar()
        {
            // recebe os dados
            $email = trim($_POST["email"]);
            $senha_digitada = trim($_POST["senha"]);

            // chama o model
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->buscarPorEmail($email);

            // verifica o usuário e a senha
            if($usuario && password_verify($senha_digitada, $usuario['senha']))
            {
                // deu certo, cria a sessão
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_tipo'] = $usuario['tipo_usuario'];

                // redireciona para a view correspondente
                switch($usuario['tipo_usuario'])
                {
                    case 'catequizando':
                        header('Location: /cateclass-site/app/catequizando');
                    break;

                    case 'catequista':
                        header('Location: /cateclass-site/app//catequista');
                    break;

                    case 'coordenador':
                        header('Location: /cateclass-site/app//coordenador');
                    break;

                    default:
                        // fallback
                        header('Location: /cateclass-site/app//login');
                }
                exit;
            }
            else
            {
                // Falha: Prepara dados de erro
                $dados['erro'] = "Email ou senha inválidos.";
            
                // 5. Recarrega a view de login, passando o erro
                require_once "views/formLogin.php";
            }
        }
    }
?>