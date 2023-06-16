<?php

    require_once("config.php");
    require_once("property.ini.php");

    class Resources extends Config {
        
        public function getResource($lang) {
            
            if ($lang === 'pt-PT') {
                if(!file_exists(__DIR__ . '/../Resources_PT.ini')){
                    echo 'File '.__DIR__ . '/../Resources_PT.ini does not exist';
                }
                print_r(__DIR__ . '/../Resources_PT.ini');
                print_r(parse_ini_file(__DIR__ . '/../Resources_PT.ini'));
                
                return parse_ini_file(__DIR__ . '/../Resources_PT.ini');

            } else if ($lang === 'en-GB') {
                print_r(__DIR__ . '/../Resources_EN.ini');
                print_r(parse_ini_file(__DIR__ . '/../Resources_EN.ini'));

                return parse_ini_file(__DIR__ . '/../Resources_EN.ini');
            }
        }
    }
