<?php 

require_once 'Conexao.class.php'; 
require_once 'Resposta.class.php';

class RespostaDAO extends Conexao
{
    public function inserirResposta(Resposta $resposta)
    {
        $sql = "INSERT INTO respostas (catequizando_id, atividade_id, texto, data_envio)
                VALUES (:catequizando_id, :atividade_id, :texto, NOW())";
        
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':catequizando_id', $resposta->getCatequizandoId(), PDO::PARAM_INT);
            $stm->bindValue(':atividade_id', $resposta->getAtividadeId(), PDO::PARAM_INT);
            $stm->bindValue(':texto', $resposta->getTexto());
            
            $stm->execute();
            return "sucesso";

        } catch (PDOException $e) {
            error_log($e->getMessage());
            if ($e->getCode() == 23000) {
                return "Você já enviou uma resposta para esta atividade.";
            }
            return "Erro ao enviar resposta: " . $e->getMessage();
        }
    }

    public function buscarRespostaDoAluno($atividadeId, $catequizandoId)
    {
        $sql = "SELECT id_resposta, texto, comentario_catequista 
                FROM respostas 
                WHERE atividade_id = :atividade_id 
                  AND catequizando_id = :catequizando_id";
        
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindParam(':atividade_id', $atividadeId, PDO::PARAM_INT);
            $stm->bindParam(':catequizando_id', $catequizandoId, PDO::PARAM_INT);
            $stm->execute();
            
            return $stm->fetch(PDO::FETCH_OBJ); 

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function buscarRespostasDaAtividade($atividadeId)
    {
        $sql = "SELECT r.*, u.nome as nome_catequizando 
                FROM respostas r
                JOIN usuarios u ON r.catequizando_id = u.id_usuario
                WHERE r.atividade_id = :atividade_id
                ORDER BY r.data_envio DESC";
        
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindParam(':atividade_id', $atividadeId, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function deletarResposta($respostaId, $catequizandoId)
    {
        $sql = "DELETE FROM respostas 
                WHERE id_resposta = :id_resposta 
                AND catequizando_id = :catequizando_id";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_resposta', $respostaId, PDO::PARAM_INT);
            $stmt->bindParam(':catequizando_id', $catequizandoId, PDO::PARAM_INT);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return "sucesso";
            } else {
                return "Resposta não encontrada ou não pertence a você.";
            }

        } catch(PDOException $e) {
            error_log($e->getMessage());
            return "Erro ao cancelar envio: " . $e->getMessage();
        }
    }

    // busca a resposta especifica pelo ID
    public function buscarRespostaUnicaPorId($respostaId)
    {
        $sql = "SELECT r.*, u.nome as nome_catequizando 
                FROM respostas r
                JOIN usuarios u ON r.catequizando_id = u.id_usuario
                WHERE r.id_resposta = :resposta_id";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':resposta_id', $respostaId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // salva a resposta do catequista
    public function salvarFeedback($respostaId, $comentario)
    {
        $sql = "UPDATE respostas 
                SET comentario_catequista = :comentario 
                WHERE id_resposta = :resposta_id";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':comentario', $comentario);
            $stmt->bindParam(':resposta_id', $respostaId, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}