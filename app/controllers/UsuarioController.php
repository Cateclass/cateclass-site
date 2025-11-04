<?php
require_once "models/Conexao.class.php";
require_once "models/UsuarioDAO.class.php";
require_once "models/Usuario.class.php";

class UsuarioController
{
    public function login()
    {
        $msg = ""; // Para exibir erro na view
        
        if (isset($_POST['login'])) { // Verifica se o formulário foi enviado
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            // 1. Controller chama o DAO
            $usuarioDAO = new UsuarioDAO();
            $retorno = $usuarioDAO->buscarPorEmail($email); // O DAO só busca na tabela 'usuarios'

            // 2. Controller trata o resultado
            if ($retorno && password_verify($senha, $retorno->senha)) {
                
                // Cria a sessão
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['id_usuario'] = $retorno->id_usuario;
                $_SESSION['nome'] = $retorno->nome;
                $_SESSION['tipo_funcao'] = $retorno->tipo_funcao; // A CHAVE!

                // 4. Redireciona com base no tipo
                switch ($_SESSION['tipo_funcao']) {
                    case "coordenador":
                        header("location:/cateclass-site/app/coordenador");
                        break;
                    case "catequista":
                        header("location:/cateclass-site/app/catequista");
                        break;
                    case "catequizando":
                        header("location:/cateclass-site/app/catequizando");
                        break;
                    case "responsavel":
                        header("location:/cateclass-site/app/responsavel");
                        break;
                }
                exit(); // Para o script após redirecionar
            } else {
                // 5. Falha no login
                $msg = "Email ou senha incorretos";
            }
        }
        
        // Carrega a view de login (seja no início ou após falha)
        require_once "Views/login.php";
    }
    
    public function inserir()
    {
        $msg = "";
        
        if (isset($_POST['register'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $funcao = $_POST['funcao']; // "catequista", "catequizando", etc.

            // Instancia o DAO principal
            $usuarioDAO = new UsuarioDAO();

            // 1. Verifica se o e-mail já existe na tabela 'usuarios'
            $checkEmail = $usuarioDAO->buscarPorEmail($email);

            if ($checkEmail) {
                $msg = "Email já cadastrado!";
            } else {
                // 2. Insere na tabela-pai 'usuarios'
                $novoUsuario = new Usuario(0, $nome, $email, $senha, $funcao);
                $id_usuario_inserido = $usuarioDAO->inserir($novoUsuario); // DAO deve retornar o ID

                if ($id_usuario_inserido) {
                    // 3. Insere na tabela-filha específica
                    
                    $daoEspecifico = null;
                    
                    switch ($funcao) {
                        case "catequista":
                            require_once "models/CatequistaDAO.class.php";
                            $daoEspecifico = new CatequistaDAO();
                            break;
                        case "catequizando":
                            require_once "models/CatequizandoDAO.class.php";
                            $daoEspecifico = new CatequizandoDAO();
                            break;
                    }

                    if ($daoEspecifico) {
                        // Passa o ID do usuário-pai para o DAO-filho
                        $daoEspecifico->inserir($id_usuario_inserido);
                    }
                    
                    // Redireciona para o login
                    header("Location: index.php?controle=UsuarioController&metodo=login");
                    exit();
                } else {
                    $msg = "Erro ao cadastrar usuário.";
                }
            }
        }
        
        // Carrega a view de registro
        require_once "Views/register.php";
    }
}
?>