<?php
    namespace Libs;
    use Libs\View;

    class Controller {
        public $view; 

        public function __construct(){
            $this->view = new View();
        }

        /*

        */
        public function redirect($url, $data_in = []){
            $data = [];
            $params = "";

            foreach ($data_in as $key => $value) {
                $data[] = "$k=$v";
            }

            $params = join("&", $data);
            if (!empty($params)) $params = "?". $params;
            header("Location: " . URL . '/' . $url . $params);
        }
    }
    