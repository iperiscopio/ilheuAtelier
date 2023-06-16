<?php

    require_once("config.php");
    require_once("property.ini.php");

    class Resources extends Config {
        
        public function getResource($lang) {
            
            if ($lang === 'pt-PT') {
                
                return parse_ini_file(__DIR__ . '/../Resources_PT.ini');

            } else if ($lang === 'en-GB') {

                return parse_ini_file(__DIR__ . '/../Resources_EN.ini');
            }
        }
    }
