<?php

    require_once("config.php");

    class Resources extends Config {
        
        public function getResource($lang) {
            
            if ($lang === 'pt-PT') {
                
                return parse_ini_file(__DIR__ . '/../Resources_PT.ini', false, INI_SCANNER_RAW);

            } else if ($lang === 'en-GB') {

                return parse_ini_file(__DIR__ . '/../Resources_EN.ini', false, INI_SCANNER_RAW);
            }
        }
    }
