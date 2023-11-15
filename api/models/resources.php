<?php

    require_once("config.php");

    class Resources extends Config {
        
        // public function getResource($lang) {
            
        //     if ($lang === 'pt-PT') {
                
        //         return parse_ini_file(__DIR__ . '/../Resources_PT.ini', false, INI_SCANNER_RAW);

        //     } else if ($lang === 'en-GB') {

        //         return parse_ini_file(__DIR__ . '/../Resources_EN.ini', false, INI_SCANNER_RAW);
        //     }
        // }

        private $resources;

        public function getResource($lang) {
            if (!$this->resources) {
                $this->loadResources();
            }
            print_r($lang);
            print_r(__DIR__);
            print_r($resources[$lang]);
            print_r($resources);

            return $this->resources[$lang] ?? [];
        }

        private function loadResources() {
            $this->resources = [
                'pt-PT' => parse_ini_file(__DIR__ . '/../Resources_PT.ini', false, INI_SCANNER_RAW),
                'en-GB' => parse_ini_file(__DIR__ . '/../Resources_EN.ini', false, INI_SCANNER_RAW),
            ];
        }
    }
