<?php

    require_once("config.php");

    class Resources extends Config {
        
        public function getResource($lang) {
            var_dump(__DIR__);
            if ($lang === 'pt-PT') {
                return parse_ini_file(__DIR__ . '/../Resources_PT.ini');
            } else if ($lang === 'en-GB') {
                return parse_ini_file(__DIR__ . '/../Resources_EN.ini');
            }
        }
    }
