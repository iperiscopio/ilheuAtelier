<?php

    require_once("config.php");

    class Resources extends Config {
        
        public function getResource($lang) {

            var_dump($lang);

            if ($lang === 'pt-PT') {
                var_dump('entrou pt');
                var_dump(parse_ini_file(__DIR__ . '/../Resources_PT.ini'));
                
                return parse_ini_file(__DIR__ . '/../Resources_PT.ini');

            } else if ($lang === 'en-GB') {

                return parse_ini_file(__DIR__ . '/../Resources_EN.ini');
            } else {
                var_dump('else');
                return parse_ini_file(__DIR__ . '/../Resources_PT.ini');
            }
            var_dump('fora if else');
        }
    }
