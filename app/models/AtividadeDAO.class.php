<?php 

class AtividadeDAO extends Conexao
{
    public function countAtividadesDoCatequizando($catequizandoId)
    {
        $sql = "SELECT COUNT(a.id_atividade) as total 
                FROM atividades a
                JOIN turmas_catequizandos tc ON a.turma_id = tc.turma_id 
                WHERE tc.catequizando_id = :id"; 
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $catequizandoId, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $resultado['total'] ?? 0;

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return 0;
        }
    }

    public function countAtividadesConcluidas($catequizandoId)
    {
        $sql = "SELECT COUNT(id_resposta) as total 
                FROM respostas 
                WHERE catequizando_id = :id";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $catequizandoId, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $resultado['total'] ?? 0;

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return 0;
        }
    }
}