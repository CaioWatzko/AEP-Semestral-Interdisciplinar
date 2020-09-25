<?php

    class BancoDeDados
    {
        private $bdHost    = BD_HOST;
        private $bdUsuario = BD_USUARIO;
        private $bdSenha   = BD_SENHA;
        private $bdNome    = BD_NOME;

        private $confirmar;
        private $bdManipulador;
        private $erro;

        public function __construct ()
        {

            $condutor = 'mysql:host' . $this->bdHost . ';bdhost' . $this->bdNome;
            $opcoes = array
                      (
                          PDO::ATTR_PERSISTENT => true,
                          PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
                      );
            
            try
            {

                $this->dbManipulador = new PDO($condutor, $this->bdUsuario, $this->bdSenha, $opcoes);

            } catch (PDOException $e) {

                $this->error = $e->getMessage();
                echo $this->error;

            }//Fim do catch

        }//Fim do construtor

        //Criação de novas querys
        public function query ($sql)
        {

            $this->declarador = $this->bdManipulador->preparador ($sql);

        }//Fim da função query

        //Vincula os valores
        public function vinculador ($parametro, $valor, $tipo = null)
        {

            switch (is_null ($tipo))
            {
                case is_int ($valor):
                    $tipo = PDO::PARAM_INT;
                break;

                case is_bool ($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;

                case is_null ($valor):
                    $tipo = PDO::PARAM_NULL;
                break;

                default:
                    $tipo = PDO::PARAM_STR;

            }//Fim do switch

            $this->declarador->vinculadorDeValor ($parametro, $valor, $tipo);

        }//Fim da função Vinculador

        //Executa a declaração pronta
        public function executar()
        {
            return $this->declarador->executar ();
        }//Fim da Função executar

        //Retorna um Array
        public function resultadoSet ()
        {
            $this->executar();
            return $this->declarador->fetchAll (PDO::FETCH_OBJ);

        }//Fim da função resultadoSet

        //Retorna uma linha específica como um objeto
        public function individual ()
        {

            $this->executar();
            return $this->declarador->fetch (PDO::FETCH_OBJ);
        
        }//Fim da função individual

        //Conta as linhas existentes
        public function contadorDeLinhas ()
        {

            return $this->declarador->contadorDeLinhas();

        }//Fim da função contadorDeLinhas

    }//Fim da classe BancoDeDados