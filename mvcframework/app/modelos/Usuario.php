<?php

    class Usuario
    {
        private $bd;

        public function __construct ()
        {

            $this->bd = new BancoDeDados;

        }//Fim do construtor

        public function getUsuarios()
        {
            $this->bd->query("SELECT * FROM usuarios");

            $resultado = $this->bd->resultadoSet();

            return $resultado;

        }//Fim da função getUsuarios

    }//Fim da classe Usuarios