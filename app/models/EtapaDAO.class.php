<?php 

class EtapaDAO extends Conexao
{
    public function buscarTodas()
    {
        $sql = "SELECT * FROM etapas WHERE deletado_em IS NULL ORDER BY nome_etapa";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
}