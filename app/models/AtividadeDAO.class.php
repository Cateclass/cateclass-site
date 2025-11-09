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

            // verifica o filtro
            switch ($filtro) {
                case 'pendentes':
                    $sqlBase .= " AND r.id_resposta IS NULL"; // Não respondidas
                    break;
                case 'atrasadas':
                    // Não respondidas E data de entrega já passou
                    $sqlBase .= " AND r.id_resposta IS NULL AND a.data_entrega < NOW()"; 
                    break;
                case 'concluidas':
                    $sqlBase .= " AND r.id_resposta IS NOT NULL"; // Respondidas
                    break;
                case 'todas':
                default:
                    // Não faz nada, pega todas
                    break;
            }

            $sqlBase .= " ORDER BY a.data_entrega DESC";

            try
            {
                $stm = $this->db->prepare($sqlBase);
                $stm->bindParam(':id_catequizando', $catequizandoId, PDO::PARAM_INT);
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e)
            {
                error_log($e->getMessage());
                return [];
            }
        }

        public function getAtividadesDaTurma($turmaId)
        {
            $sql = "SELECT * FROM atividades WHERE turma_id = :turma_id ORDER BY data_entrega DESC";

            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindParam(':turma_id', $turmaId, PDO::PARAM_INT);
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e)
            {
                error_log($e->getMessage());
                return [];
            }
        }

        public function inserirAtividade(Atividade $atividade)
        {
            $sql = "INSERT INTO atividades (titulo, descricao, data_entrega, tipo, turma_id) 
            VALUES (:titulo, :descricao, :data_entrega, :tipo, :turma_id)";

            try 
            {
                $stmt = $this->db->prepare($sql);
                
                $stmt->bindValue(':titulo', $atividade->getTitulo());
                $stmt->bindValue(':descricao', $atividade->getDescricao());
                $stmt->bindValue(':data_entrega', $atividade->getDataEntrega());
                $stmt->bindValue(':tipo', $atividade->getTipo());
                $stmt->bindValue(':turma_id', $atividade->getTurmaId(), PDO::PARAM_INT);
                
                $stmt->execute();
                return "sucesso";

            } 
            catch (PDOException $e) 
            {
                error_log($e->getMessage());
                return "Erro ao criar atividade.";
            }
        }

        public function getAtividadesDoCatequista($catequistaId)
        {
            $sql = "SELECT a.*, t.nome_turma 
                    FROM atividades a
                    JOIN turmas t ON a.turma_id = t.id_turma
                    WHERE t.catequista_id = :catequista_id
                    ORDER BY a.data_entrega DESC";
            
            try {
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':catequista_id', $catequistaId, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                return [];
            }
        }

        public function getStatsAtividadesDoCatequista($catequistaId)
        {
            $stats = [
                'total' => 0,
                'pendentes' => 0,
                'naoEnviadas' => 0,
                'concluidas' => 0
            ];

            try {
                $sqlTotal = "SELECT COUNT(a.id_atividade) as total
                            FROM atividades a
                            JOIN turmas t ON a.turma_id = t.id_turma
                            WHERE t.catequista_id = :id";
                $stmtTotal = $this->db->prepare($sqlTotal);
                $stmtTotal->bindParam(':id', $catequistaId, PDO::PARAM_INT);
                $stmtTotal->execute();
                $totalResult = $stmtTotal->fetch(PDO::FETCH_ASSOC);
                $stats['total'] = $totalResult['total'] ?? 0;

                return $stats;

            } catch (PDOException $e) {
                error_log($e->getMessage());
                return $stats;
            }
        }
    }
?>