<?php

    class Controlador
    {
        public function modelo ($modelo)
        {
            require_once "../app/modelos/" . $modelo . '.php';

            //Instanciando um modelo
            return new $modelo();

        }//Fim da função modelo

        //Verifica se o arquivo existe
        public function visualizacao ($visualizador, $dados = [])
        {
            if (file_exists ('../app/visualizacao/' . $visualizador . '.php'))
            {

                require_once '../app/visualizacao/' . $visualizador . '.php';
                
            } else {

                die("Não foram encontrados resultados.");
                
            }//Fim else
        }//Fim da função visualizacao
    }//Fim da classe Controlador