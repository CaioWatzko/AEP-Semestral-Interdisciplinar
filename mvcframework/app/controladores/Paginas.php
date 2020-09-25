<?php

    class Paginas extends Controlador
    {
        public function __construct()
        {
            
            $this->modeloDeUsuario = $this->modelo ('Usuarios');

        }//Fim do construtor

        public function index()
        {

            $dados =
            [
                'titulo'   => 'Pagina Inicial'
            ];

            $this->visualizacao ('paginas/index', $dados);

        }//Fim da função index

        public function sobre()
        {
            $this->visualizacao ('paginas/sobre');

        }//Fim da classe sobre

    }//Fim da classe Paginas