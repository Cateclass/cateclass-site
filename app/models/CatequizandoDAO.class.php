<?php 

require_once 'Conexao.class.php'; 

class CatequizandoDAO extends Conexao
{
    
    public function getCatequizandosDaTurma($turmaId)
    {
        $sql = "SELECT u.nome, u.email
                FROM usuarios u
                JOIN turmas_catequizandos tc ON u.id_usuario = tc.catequizando_id
                WHERE tc.turma_id = :turma_id
                ORDER BY u.nome";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':turma_id', $turmaId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
}