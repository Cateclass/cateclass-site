<?php 
    class CatequizandoController
    {
        public function home()
        {
            require_once "views/catequizandos/dashboard.php";
        }

        public function atividades()
        {
            require_once "views/catequizandos/atividades.php";
        }
    }
?>