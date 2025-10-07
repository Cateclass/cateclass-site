<?php

    class Catequista extends Usuario 
    {

        /** Método construtor */

        public function __construct(
            private int $etapa = 0 
        ) {}

        /** Getters */

        public function getEtapa()
        {
            return $this->etapa;
        }

        /** Setters */

        public function setEtapa($etapa)
        {
            $this->etapa = $etapa;
        }

    }

?>