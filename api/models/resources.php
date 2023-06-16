<?php

    require_once("config.php");

    class Resources extends Config {
        
        public function getResource($lang) {
            
            if ($lang === 'pt-PT') {
                
                return parse_ini_file(__DIR__ . '/../Resource_PT.ini');

            } else if ($lang === 'en-GB') {

                return parse_ini_file(__DIR__ . '/../Resources_EN.ini');
            }
        }
    }
