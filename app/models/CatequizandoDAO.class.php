<?php 

    class CatequizandoDAO extends Conexao
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function insert($catequizando)
        {
            $sql = "INSERT INTO catequizandos (nome, etapa) VALUES (?, ?);";

            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $catequizando->getNome());
                $stm->bindValue(2, $catequizando->getEtapa());
                $stm->execute();
                $this->db = null;
                return "Catequizando inserido com sucesso";
            }
            catch(PDOException $e)
            {
                $this->db = null;
                return "Problema com o cadastro do catequizando";
            }

        }
    }