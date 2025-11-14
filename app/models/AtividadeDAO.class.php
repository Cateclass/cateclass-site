<?php 

require_once 'Conexao.class.php'; 
require_once 'Atividade.class.php';

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

    public function getAtividadesDoCatequizando($catequizandoId, $filtro = 'todas')
    {
        $sqlBase = "SELECT 
                    a.id_atividade, a.titulo, a.descricao, a.data_entrega, a.tipo,
                    t.nome_turma,
                    r.id_resposta 
                FROM atividades a
                JOIN turmas t ON a.turma_id = t.id_turma
                JOIN turmas_catequizandos tc ON a.turma_id = tc.turma_id
                LEFT JOIN respostas r ON a.id_atividade = r.atividade_id 
                                     AND r.catequizando_id = :id_catequizando
                WHERE tc.catequizando_id = :id_catequizando";

        switch ($filtro) {
            case 'pendentes':
                $sqlBase .= " AND r.id_resposta IS NULL"; 
                break;
            case 'atrasadas':
                $sqlBase .= " AND r.id_resposta IS NULL AND a.data_entrega < NOW()"; 
                break;
            case 'concluidas':
                $sqlBase .= " AND r.id_resposta IS NOT NULL"; 
                break;
            case 'todas':
            default:
                break;
        }
        $sqlBase .= " ORDER BY a.data_entrega DESC";
        
        try {
            $stmt = $this->db->prepare($sqlBase); 
            $stmt->bindParam(':id_catequizando', $catequizandoId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
    
    public function getAtividadesDaTurma($turmaId)
    {
        $sql = "SELECT a.*, 
                (SELECT COUNT(r.id_resposta) FROM respostas r WHERE r.atividade_id = a.id_atividade) as total_entregas
                FROM atividades a
                WHERE a.turma_id = :turma_id
                ORDER BY a.data_entrega DESC";
        
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
    
    public function inserirAtividade(Atividade $atividade)
    {
        $sql = "INSERT INTO atividades (titulo, descricao, data_entrega, tipo, tipo_entrega, turma_id)
                VALUES (:titulo, :descricao, :data_entrega, :tipo, :tipo_entrega, :turma_id)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':titulo', $atividade->getTitulo());
            $stmt->bindValue(':descricao', $atividade->getDescricao());
            $stmt->bindValue(':data_entrega', $atividade->getDataEntrega());
            $stmt->bindValue(':tipo', $atividade->getTipo());
            $stmt->bindValue(':tipo_entrega', $atividade->getTipoEntrega());
            $stmt->bindValue(':turma_id', $atividade->getTurmaId(), PDO::PARAM_INT);
            $stmt->execute();
            return "sucesso";
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return "Erro ao inserir atividade: " . $e->getMessage();
        }
    }

    public function getAtividadesDoCatequista($catequistaId)
    {
        $sql = "SELECT a.id_atividade, a.titulo, a.descricao, a.tipo, a.data_entrega, t.nome_turma
                FROM atividades a
                JOIN turmas t ON a.turma_id = t.id_turma
                WHERE t.catequista_id = :catequista_id
                ORDER BY a.data_entrega DESC"; // mudança aqui
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':catequista_id', $catequistaId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function getStatsAtividadesDoCatequista($catequistaId)
    {
        $sqlTotal = "SELECT COUNT(a.id_atividade) as total
                     FROM atividades a
                     JOIN turmas t ON a.turma_id = t.id_turma
                     WHERE t.catequista_id = :catequista_id";
        try {
            $stmtTotal = $this->db->prepare($sqlTotal);
            $stmtTotal->bindParam(':catequista_id', $catequistaId, PDO::PARAM_INT);
            $stmtTotal->execute();
            $total = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
            
            return [
                'total' => $total,
                'pendentes' => 0, 
                'naoEnviadas' => 0, 
                'concluidas' => 0 
            ];

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return ['total' => 0, 'pendentes' => 0, 'naoEnviadas' => 0, 'concluidas' => 0];
        }
    }

    public function buscarAtividadePorId($atividadeId)
    {
        $sql = "SELECT 
                    a.id_atividade, a.titulo, a.descricao, a.data_entrega, a.tipo, a.tipo_entrega,
                    t.nome_turma, 
                    e.nome_etapa 
                FROM atividades a
                JOIN turmas t ON a.turma_id = t.id_turma
                LEFT JOIN etapas e ON t.etapa_id = e.id_etapa
                WHERE a.id_atividade = :atividade_id";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':atividade_id', $atividadeId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function buscarAtividadeParaCatequista($atividadeId, $catequistaId)
    {
        $sql = "SELECT a.id_atividade, a.titulo, a.descricao, a.tipo_entrega, t.nome_turma
                FROM atividades a
                JOIN turmas t ON a.turma_id = t.id_turma
                WHERE a.id_atividade = :atividade_id 
                  AND t.catequista_id = :catequista_id";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':atividade_id', $atividadeId, PDO::PARAM_INT);
            $stmt->bindParam(':catequista_id', $catequistaId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}