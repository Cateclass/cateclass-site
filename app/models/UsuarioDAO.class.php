<?php
class UsuarioDAO extends Conexao
{
    private $conexao;

    public function __construct()
    {
        // Pega a conexão do Conexao.class.php
        parent::__construct(); 
    }

    public function buscarPorEmail($email)
    {
        $stmt = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Retorna o usuário como um objeto (ou false se não encontrar)
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    // fazer outros métodos
    // Recebe um objeto Usuario
    public function inserir(Usuario $usuario) 
    {
        $stmt = $this->conexao->prepare(
            "INSERT INTO usuarios (nome, email, senha, tipo_funcao) 
             VALUES (:nome, :email, :senha, :funcao)"
        );
        
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->bindValue(':funcao', $usuario->getTipoFuncao());
        
        if ($stmt->execute()) {
            return $this->conexao->lastInsertId(); // Retorna o ID do usuário criado
        }
        return false;
    }
}
?>