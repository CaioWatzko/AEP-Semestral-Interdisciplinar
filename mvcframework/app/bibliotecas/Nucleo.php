<?php

    class Nucleo
    {
        protected $controladorAtual = 'Paginas';
        protected $metodoAtual      = 'index';
        protected $parametros       = [];
        
        public function __construct ()
        {
            $url = $this->getUrl ();

            if (file_exists('../app/controladores/' . ucwords ($url[0]) . '.php'))
            {
                //Troca o controlador atual
                $this->controladorAtual = ucwords ($url[0]);

                unset ($url[0]);

            }//Fim do if

            require_once '../app/controladores/' . $this->controladorAtual . '.php';

            $this->controladorAtual = new $this->controladorAtual;

            //Verifica a segunda parte da URL
            if (isset ($url[1]))
            {
                //Verifica se o metodo existe no controlador
                if (method_exists ($this->controladorAtual, $url[1]))
                {
                    $this->metodoAtual = $url[1];
                    unset ($url[1]);
                }//Fim do if
            }//Fim do if

            //Verificação de parâmetros
            $this->parametros = $url ? array_values ($url) : [];

            //Requisita um retorno dos parametros por um array
            call_user_func_array ([$this->controladorAtual, $this->metodoAtual], $this->parametros);

        }//Fim do construtor

        public function getUrl ()
        {
            if (isset ($_GET['url']))
            {
                $url = rtrim ($_GET['url'], '/');
                //Permite filtrar as variáveis por string/numero
                $url = filter_var ($url, FILTER_SANITIZE_URL);
                $url = explode ('/', $url);

                return $url;

            }//Fim do if
        }//Fim do getUrl
    }//Fim da classe Nucleo