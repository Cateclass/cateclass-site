<?php 
    class Turma
    {
        public function __construct
        (
            private int $id_turma = 0,
            private string $nome_turma = "",
            private string $tipo_turma = "",
            private string $data_inicio = "",
            private string $data_termino = "",
            private int $etapa_id = 0,
            private int $codigo_turma = 0,
            private int $catequista_id = 0 
        )
        {}

        public function getIdTurma() {
        return $this->id_turma;
        }
        public function setIdTurma($id_turma) {
            $this->id_turma = $id_turma;
        }

        public function getNomeTurma() {
            return $this->nome_turma;
        }
        public function setNomeTurma($nome_turma) {
            $this->nome_turma = $nome_turma;
        }

        public function getTipoTurma() {
            return $this->tipo_turma;
        }
        public function setTipoTurma($tipo_turma) {
            $this->tipo_turma = $tipo_turma;
        }

        public function getDataInicio() {
            return $this->data_inicio;
        }
        public function setDataInicio($data_inicio) {
            $this->data_inicio = $data_inicio;
        }

        public function getDataTermino() {
            return $this->data_termino;
        }
        public function setDataTermino($data_termino) {
            $this->data_termino = $data_termino;
        }

        public function getEtapaId() {
            return $this->etapa_id;
        }
        public function setEtapaId($etapa_id) {
            $this->etapa_id = $etapa_id;
        }

        public function getCodigoTurma() {
            return $this->codigo_turma;
        }
        public function setCodigoTurma($codigo_turma) {
            $this->codigo_turma = $codigo_turma;
        }
        
        public function getCatequistaId() {
            return $this->catequista_id;
        }
        public function setCatequistaId($catequista_id) {
            $this->catequista_id = $catequista_id;
        }
    }
?>