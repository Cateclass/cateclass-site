<?php

    class Catequizando extends Usuario 
    {

        /** Método construtor */

        public function __construct(
            private int $id_catequizando = 0, private int $etapa = 0, private int $ano = 0, private string $nome_do_responavel = "", private string $data_de_nascimento = "", private string $escola = "", private string $paroquia_de_origem = "", private string $transferencia = "", private string $data_de_inicio = "", private int $codigo_catequista = 0
        ) {}

        /** Getters */

        public function getId_catequizando()
        {
            return $this->id_catequizando;
        }

        public function getEtapa() 
        {
            return $this->etapa;
        }

        public function getAno()
        {
            return $this->ano;
        }

        public function getNome_do_responsavel()
        {
            return $this->nome_do_resposavel;
        }

        public function getData_de_nascimento()
        {
            return $this->data_de_nascimento;
        }

        public function getEscola()
        {
            return $this->escola;
        }

        public function getParoquia_de_origem()
        {
            return $this->paroquia_de_origem;
        }

        public function getTransferencia()
        {
            return $this->transferencia;
        }

        public function getData_de_inicio()
        {
            return $this->data_de_inicio;
        }

        public function getCodigo_catequista()
        {
            return $this->codigo_catequista;
        }

        /** Setters */

        public function setId_catequizando($id_catequizando)
        {
            $this->id_catequizando = $id_catequizando;
        }

        public function setEtapa($etapa) 
        {
            $this->etapa = $etapa;
        }

        public function setAno($ano)
        {
            $this->ano = $ano;
        }

        public function setNome_do_responsavel($nome_do_resposavel)
        {
            $this->nome_do_resposavel = $nome_do_resposavel;
        }

        public function setData_de_nascimento($data_de_nascimento)
        {
            $this->data_de_nascimento = $data_de_nascimento;
        }

        public function setEscola($escola)
        {
            $this->escola = $escola;
        }

        public function setParoquia_de_origem($paroquia_de_origem)
        {
            $this->paroquia_de_origem = $paroquia_de_origem;
        }

        public function setTransferencia($transferencia)
        {
            $this->transferencia = $transferencia;
        }

        public function setData_de_inicio($data_de_inicio)
        {
            $this->data_de_inicio = $data_de_inicio;
        }

        public function setCodigo_catequista($codigo_catequista)
        {
            $this->codigo_catequista = $codigo_catequista;
        }

    }

?>