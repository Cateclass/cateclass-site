<?php

    class Catequizando extends Usuario 
    {

        /** Método construtor */

        public function __construct(
            private string $data_nascimento = "",
            private string $escola = "",
            private string $paroquia_origem = "",
            private string $transferencia = "",
            private string $data_inicio = ""
        ) 
        {
            parent::__construct();
        }

        /** Getters */

        public function getDataNascimento()
        {
            return $this->data_nascimento;
        }

        public function getEscola()
        {
            return $this->escola;
        }

        public function getParoquiaOrigem()
        {
            return $this->paroquia_origem;
        }

        public function getTransferencia()
        {
            return $this->transferencia;
        }

        public function getDataInicio()
        {
            return $this->data_inicio;
        }

        /** Setters */

        public function setDataNascimento($data_nascimento)
        {
            $this->data_nascimento = $data_nascimento;
        }

        public function setEscola($escola)
        {
            $this->escola = $escola;
        }

        public function setParoquiaOrigem($paroquia_origem)
        {
            $this->paroquia_origem = $paroquia_origem;
        }

        public function setTransferencia($transferencia)
        {
            $this->transferencia = $transferencia;
        }

        public function setDataInicio($data_inicio)
        {
            $this->data_inicio = $data_inicio;
        }

    }   

?>