<?php
    namespace Libs;

    class View {        
        public $datav;

        public function render($name, $data = []){
            $this->dataview = (object) $data;
            
            $file = 'views/'. $name .'.php';
            if (!file_exists($file)){
                echo "FILE NOT FOUND";
                exit;
            }
            require_once $file;
            exit;
        }
        
    }
    