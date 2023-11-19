<?php

    class Resources {
        
       private $resources;

       public function getResource($lang) {
           if (!$this->resources) {
               $this->loadResources();
           }

           return $this->resources[$lang] ?? [];
       }

       private function loadResources() {
           $this->resources = [
               'pt-PT' => parse_ini_file(__DIR__ . '/../Resources_PT.ini', false, INI_SCANNER_RAW),
               'en-GB' => parse_ini_file(__DIR__ . '/../Resources_EN.ini', false, INI_SCANNER_RAW),
           ];
       }
    }
