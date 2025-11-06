<?php 
    class TurmaDAO extends Conexao
    {
        public function countTurmasCatequizando($catequizando_id)
        {
            $sql = "SELECT COUNT(turma_id) AS total FROM turmas_catequizandos WHERE catequizando_id = :id";

            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindParam(':id', $catequizando_id, PDO::PARAM_INT);
                $stm->execute();
                $resultado = $stm->fetch(PDO::FETCH_ASSOC);

                return (int) $resultado['total'] ?? 0;
            }
            catch(PDOException $e)
            {
                error_log($e->getMessage()); 
                return 0;
            }
        }

        public function getTurmasCatequizando($catequizando_id)
        {
            $sql = "SELECT 
                    t.nome_turma, 
                    e.nome_etapa, 
                    tc.status
                FROM turmas t
                JOIN etapas e ON t.etapa_id = e.id_etapa
                JOIN turmas_catequizandos tc ON t.id_turma = tc.turma_id 
                WHERE tc.catequizando_id = :id";

            try 
            {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $catequizando_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
            } 
            catch(PDOException $e) 
            {
                error_log($e->getMessage());
                return [];
            }
        }
    }
?>