<?php 
    class Resposta
    {
        public function __construct(
            private int $id_resposta = 0,
            private int $catequizando_id = 0,
            private int $atividade_id = 0,
            private ?string $texto = null,
            private string $data_envio = "",
            private ?string $comentario_catequista = null
        ) {}

        public function getIdResposta() {
            return $this->id_resposta;
        }
        public function setIdResposta($id_resposta) {
            $this->id_resposta = $id_resposta;
        }

        public function getCatequizandoId() {
            return $this->catequizando_id;
        }
        public function setCatequizandoId($catequizando_id) {
            $this->catequizando_id = $catequizando_id;
        }

        public function getAtividadeId() {
            return $this->atividade_id;
        }
        public function setAtividadeId($atividade_id) {
            $this->atividade_id = $atividade_id;
        }

        public function getTexto() {
            return $this->texto;
        }
        public function setTexto(?string $texto) {
            $this->texto = $texto;
        }

        public function getDataEnvio() {
            return $this->data_envio;
        }
        public function setDataEnvio($data_envio) {
            $this->data_envio = $data_envio;
        }

        public function getComentarioCatequista() {
            return $this->comentario_catequista;
        }
        public function setComentarioCatequista($comentario_catequista) {
            $this->comentario_catequista = $comentario_catequista;
        }
    }
?>