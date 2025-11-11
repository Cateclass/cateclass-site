<?php

    require_once "models/config.php";
    require_once "models/Conexao.class.php";

    class CoordenadorController 
    {
        public function home() 
        {
            global $conn;

            // Turmas
            $sql = "SELECT COUNT(*) FROM turmas";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Catequistas
            $sql = "SELECT COUNT(*) FROM catequistas";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $catequistas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Catequizandos
            $sql = "SELECT COUNT(*) FROM catequizandos";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $catequizandos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once "views/coordenador/dashboard.php";
        }

        public function turmas() 
        {
            global $conn;

            // Consulta todas as turmas com o nome da etapa
            $sql = "
                SELECT 
                    t.id_turma,
                    t.nome_turma,
                    t.tipo_turma,
                    t.data_inicio,
                    t.data_termino,
                    e.nome_etapa
                FROM turmas t
                INNER JOIN etapas e ON e.id_etapa = t.etapa_id
                WHERE t.deletado_em IS NULL
                ORDER BY t.nome_turma ASC
            ";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            require_once "views/coordenador/turmas.php";
        }

        public function catequistas() 
        {
            global $conn;

            $sql = "
                SELECT u.nome, u.email, u.telefone, u.endereco, u.criado_em
                FROM catequistas c
                INNER JOIN usuarios u ON c.usuario_id = u.id_usuario
                WHERE u.deletado_em IS NULL
                ORDER BY u.nome ASC
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            require_once "views/coordenador/catequistas.php";
        }

        public function catequizandos() 
        {
            global $conn;

            $sql = "
                SELECT 
                    u.nome, 
                    u.email, 
                    u.telefone, 
                    c.data_nascimento, 
                    c.escola, 
                    c.paroquia_origem, 
                    c.transferencia
                FROM catequizandos AS c
                INNER JOIN usuarios AS u ON c.usuario_id = u.id_usuario
                WHERE u.deletado_em IS NULL
            ";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            require_once "views/coordenador/catequizandos.php";
        }

        public function perfil() 
        {
            require_once "views/coordenador/perfil.php";
        }
    }

?>