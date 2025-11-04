<?php
    class UsuarioDAO extends Conexao
    {

        public function __construct()
        {
            // Pega a conexão do Conexao.class.php
            parent::__construct(); 
        }

        public function inserir($usuario)
        {
            $sql = "INSERT INTO usuarios (nome, email, senha, telefone, endereco, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)";

            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getNome());
                $stm->bindValue(2, $usuario->getEmail());
                $stm->bindValue(3, $usuario->getSenha());
                $stm->bindValue(4, $usuario->getTelefone());
                $stm->bindValue(5, $usuario->getEndereco());
                $stm->bindValue(6, $usuario->getTipoFuncao());
                $stm->execute();
                $this->db = null;
                return "Usuário criado com sucesso!";
            }
            catch(PDOException $e)
            {
                $this->db = null;
                return "Erro ao inserir tarefa: " . $e->getMessage();
            }
        } // fim do inserir
    }
?>