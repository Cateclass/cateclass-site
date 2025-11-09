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

        public function matricularPorCodigo($codigoTurma, $catequizandoId)
        {
            try {
                $this->db->beginTransaction();

                $sql_find = "SELECT id_turma FROM turmas WHERE codigo_turma = :codigo";
                $stmt_find = $this->db->prepare($sql_find);
                $stmt_find->bindParam(':codigo', $codigoTurma);
                $stmt_find->execute();
                
                $turma = $stmt_find->fetch(PDO::FETCH_ASSOC);

                if (!$turma) {
                    $this->db->rollBack();
                    return "Código da turma inválido.";
                }
                $turmaId = $turma['id_turma'];

                $sql_check = "SELECT COUNT(catequizando_id) as total 
                            FROM turmas_catequizandos 
                            WHERE catequizando_id = :catequizando_id AND turma_id = :turma_id";
                $stmt_check = $this->db->prepare($sql_check);
                $stmt_check->bindParam(':catequizando_id', $catequizandoId, PDO::PARAM_INT);
                $stmt_check->bindParam(':turma_id', $turmaId, PDO::PARAM_INT);
                $stmt_check->execute();
                $resultado = $stmt_check->fetch(PDO::FETCH_ASSOC);

                if ($resultado['total'] > 0) {
                    $this->db->rollBack();
                    return "Você já está matriculado nesta turma.";
                }

                $sql_insert = "INSERT INTO turmas_catequizandos (catequizando_id, turma_id, status) 
                            VALUES (:catequizando_id, :turma_id, 'Cursando')";
                $stmt_insert = $this->db->prepare($sql_insert);
                $stmt_insert->bindParam(':catequizando_id', $catequizandoId, PDO::PARAM_INT);
                $stmt_insert->bindParam(':turma_id', $turmaId, PDO::PARAM_INT);
                $stmt_insert->execute();

                $this->db->commit();
                return "sucesso";

            } catch (PDOException $e) {
                $this->db->rollBack();
                
                error_log("Erro em matricularPorCodigo: " . $e->getMessage());
                
                return "Ocorreu um erro ao tentar entrar na turma. Por favor, contate o suporte. (Erro: " . $e->getMessage() . ")";
            }
        }

        public function getTurmasDoCatequista($catequistaId)
        {
            $sql = "SELECT t.*, e.nome_etapa FROM turmas t JOIN 
            etapas e ON t.etapa_id = e.id_etapa WHERE 
            t.catequista_id = :id ORDER BY t.data_inicio DESC";

            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindParam(':id', $catequistaId, PDO::PARAM_INT);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e)
            {
                error_log($e->getMessage());
                return [];
            }
        }

        public function inserirTurma(Turma $turma)
        {
            $sql = "INSERT INTO turmas (nome_turma, tipo_turma, data_inicio, data_termino, etapa_id, catequista_id, codigo_turma) 
            VALUES (:nome, :tipo, :inicio, :termino, :etapa_id, :catequista_id, :codigo)";

            try
            {
                $codigo = strtoupper(substr(uniqid(), 7, 6));

                $stm = $this->db->prepare($sql);

                $stm->bindValue(':nome', $turma->getNomeTurma());
                $stm->bindValue(':tipo', $turma->getTipoTurma());
                $stm->bindValue(':inicio', $turma->getDataInicio());
                $stm->bindValue(':termino', $turma->getDataTermino());
                $stm->bindValue(':etapa_id', $turma->getEtapaId(), PDO::PARAM_INT);
                $stm->bindValue(':catequista_id', $turma->getCatequistaId(), PDO::PARAM_INT);
                $stm->bindValue(':codigo', $codigo);

                $stm->execute();
                return "Sucesso";
            }
            catch(PDOException $e)
            {
                error_log($e->getMessage());
                return "Erro ao criar turma.";
            }
        }

        public function buscarTurmaPorId($turmaId, $catequistaId)
        {
            $sql = "SELECT t.id_turma, t.nome_turma, t.codigo_turma, e.nome_etapa, t.tipo_turma
                    FROM turmas t
                    JOIN etapas e ON t.etapa_id = e.id_etapa
                    WHERE t.id_turma = :turma_id AND t.catequista_id = :catequista_id";
            
            try {
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':turma_id', $turmaId, PDO::PARAM_INT);
                $stmt->bindParam(':catequista_id', $catequistaId, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);

            } catch(PDOException $e) {
                error_log($e->getMessage());
                return false;
            }
        }
    }
?>