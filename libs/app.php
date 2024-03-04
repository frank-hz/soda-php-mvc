<?php
    use Libs\Controller;
    final class App
    {
        public function __construct(){
            $url = $_GET["url"] ?? "";
            $url = rtrim($url, "/");
            $url = explode("/", $url);

            // verificar url
            if (empty($url[0])) {
                echo "[error] $url[0] url controller";
                error_log("url controller");
                return;
            }

            // verificar controlador
            $file_controller = 'controllers/'. $url[0] .'.php';
            if (!file_exists($file_controller)){
                echo "[error] $url[0] file not found";
                error_log("file not found");
                return;
            }

            // verificar metodo
            $name_controller = "Controllers\\" . ucfirst($url[0]);
            $controller = new $name_controller;
            if (isset($url[1])){
                $method = $url[1];
                if (!method_exists($controller, $method)){
                    error_log('el metodo no existe');
                    echo "el metodo no existe";
                    return;
                }
                $controller->$method();
            }
        }
    }
    
?>