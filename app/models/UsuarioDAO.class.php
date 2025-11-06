<?php
    class UsuarioDAO extends Conexao
    {

        public function __construct()
        {
            // Pega a conexão do Conexao.class.php
            parent::__construct(); 
        }

        public function buscarPorEmail($email)
        {
            try
            {
                $sql = "SELECT id_usuario AS id, nome, email, senha, tipo_usuario FROM usuarios WHERE email = ?";
                $stm = $this->db->prepare($sql);
                $stm->execute([$email]);

                // retorna o usuário ou flase se não encontrar
                return $stm->fetch(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e)
            {
                $this->db = null;
                return false;
            }
        }

        public function inserir($usuario)
        {
            $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (?, ?, ?, ?)";

            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getNome());
                $stm->bindValue(2, $usuario->getEmail());
                $stm->bindValue(3, $usuario->getSenha());
                $stm->bindValue(4, $usuario->getTipoFuncao());
                $stm->execute();
                $this->db = null;
                return "Usuário criado com sucesso!";
            }
            catch(PDOException $e)
            {
                $this->db = null;
                if ($e->getCode() == 23000) {
                    return "Erro: Este email já está cadastrado.";
                }
                return "Erro ao inserir tarefa: " . $e->getMessage();
            }
        } // fim do inserir
    }
?>