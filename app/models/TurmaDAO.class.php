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

        public function matricularPorCodigo($codigoTurma, $catequizando_id)
        {
            try
            {
                // acha o id da turma usando o codigo
                $sql_find = "SELECT id_turma FROM turmas WHERE codigo_turma = :codigo";
                $stmt_find = $this->db->prepare($sql_find);
                $stmt_find->bindParam(':codigo', $codigoTurma);
                $stmt_find->execute(); 

                $turma = $stmt_find->fetch(PDO::FETCH_ASSOC);

                // se a turma não existir retorna um erro
                if (!$turma) {
                    return "Código da turma inválido.";
                }

                $turmaId = $turma['id_turma'];

                // tenta inserir o catequizando na tabela auxiliar
                $sql_insert = "INSERT INTO turmas_catequizandos (catequizando_id, turma_id, status) 
                    VALUES (:catequizando_id, :turma_id, 'Cursando')";
                $stmt_insert = $this->db->prepare($sql_insert);
                $stmt_insert->bindParam(':catequizando_id', $catequizandoId, PDO::PARAM_INT);
                $stmt_insert->bindParam(':turma_id', $turmaId, PDO::PARAM_INT);
                $stmt_insert->execute();

                return "sucesso";
            }
            catch(PDOException $e)
            {
                // Trata o erro
                if ($e->getCode() == 23000) {
                return "Você já está matriculado nesta turma.";
                }
                // Outro erro
                error_log($e->getMessage());
                return "Ocorreu um erro ao tentar entrar na turma.";
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
    }
?>