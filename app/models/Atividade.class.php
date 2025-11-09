<?php 
    class  Atividade
    {
        public function __construct
        (
            private int $id_atividade = 0,
            private string $titulo = "",
            private string $descricao = "",
            private string $data_entrega = "",
            private string $tipo = "",
            private int $turma_id = 0
        )
        {}
        
        public function getIdAtividade() {
        return $this->id_atividade;
        }
        public function setIdAtividade($id_atividade) {
            $this->id_atividade = $id_atividade;
        }

        public function getTitulo() {
            return $this->titulo;
        }
        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getDescricao() {
            return $this->descricao;
        }
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getDataEntrega() {
            return $this->data_entrega;
        }
        public function setDataEntrega($data_entrega) {
            $this->data_entrega = $data_entrega;
        }

        public function getTipo() {
            return $this->tipo;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getTurmaId() {
            return $this->turma_id;
        }
        public function setTurmaId($turma_id) {
            $this->turma_id = $turma_id;
        }
    }
?>