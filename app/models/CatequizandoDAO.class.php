<?php 

require_once 'Conexao.class.php'; 

class CatequizandoDAO extends Conexao
{
    
    public function getCatequizandosDaTurma($turmaId)
    {
        $sql = "SELECT u.id_usuario, u.nome, u.email
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

    public function removerAlunoDaTurma($catequizandoId, $turmaId)
    {
        $sql = "DELETE FROM turmas_catequizandos
                WHERE catequizando_id = :catequizando_id AND turma_id = :turma_id";

        try
        {
            $stm = $this->db->prepare($sql);
            $stm->bindParam(':catequizando_id', $catequizandoId, PDO::PARAM_INT);
            $stm->bindParam(':turma_id', $turmaId, PDO::PARAM_INT);
            $stm->execute();
            return "sucesso";
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
            return "Erro ao remover o aluno da turma.";
        }
    }
}