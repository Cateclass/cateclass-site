<?php 

    class Usuario 
    {

        /** Método construtor */

        public function __construct(
            private int $id_usuario = 0, private string $nome = "",
            private string $email = "", private string $senha = "",
            private string $telefone = "", private string $endereco = ""
        ) {}

        /** Getters */

        public function getId_usuario()
        {
            return $this->id_usuario;
        }

        public function getNome() 
        {
            return $this->nome;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getSenha()
        {
            return $this->senha;
        }

        public function getTelefone()
        {
            return $this->telefone;
        }

        public function getEndereco()
        {
            return $this->endereco;
        }

        /** Setters */

        public function setId_usuario($id_usuario)
        {
            $this->id_usuario = $id_usuario;
        }

        public function setNome($nome) 
        {
            $this->nome = $nome;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setSenha($senha)
        {
            $this->senha = $senha;
        }

        public function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }

        public function setEndereco($endereco)
        {
            $this->endereco = $endereco;
        }

    }

?>