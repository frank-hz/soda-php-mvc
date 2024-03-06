<?php 
    namespace Libs;
    // use Libs\Controller;
    
    class Error {
        public $view;
        public $data_err;

        public function __construct($err_data = []){
            $this->dataview = (object) $err_data;
            $this->render('error/index');            
        }

        function render($name){
            $file = 'views/'. $name .'.php';
            if (!file_exists($file)){
                echo "FILE NOT FOUND";
                exit;
            }
            require_once $file;
            exit;
        }
    }
    