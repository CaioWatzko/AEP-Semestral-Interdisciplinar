<?php

    class Usuarios extends Controlador
    {

        public function __construct()
        {
            
            $this->modeloDeUsuario = $this->modelo('Usuario');

        }//Fim do construtor

        public function registro ()
        {

            $dados = 
            [
                'username' => '',
                'email' => '',
                'senha' => '',
                'confirmarSenha' => '',
                'usernameError' => '',
                'emailError' => '',
                'senhaError' => '',
                'confirmarSenhaError' => ''
            ];

            $this->visualizacao('usuarios/cadastro', $dados);

        }//Fim da função registro

        public function login ()
        {

            $dados = 
            [
                'titulo'        => 'Pagina de Login',
                'usernameError' => '',
                'senhaError'    => ''
            ];

            $this->visualizacao('usuarios/login', $dados);

        }//Fim da função login

    }//Fim da classe Usuarios