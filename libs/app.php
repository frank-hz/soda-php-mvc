<?php
    use Libs\Controller;
    use Libs\Error;
    use Controllers\Main;

    class App
    {
        public function __construct(){
            $url = $_GET["url"] ?? "";
            $url = rtrim($url, "/");
            $url = explode("/", $url);

            // VERIFICAR URL
            if (empty($url[0])) {
                try {
                    $main_controller = 'controllers/main.php';
                    require_once $main_controller;
                    new Main();
                } catch (\Throwable $th) {
                    error_log(''. $th->getMessage());
                    New Error([
                        'title' => 'Error [Controller]',
                        'message' => 'main not found'
                    ]);
                    return;
                }
                return;
            }

            // VERIFICAR CONTROLADOR
            $file_controller = 'controllers/'. $url[0] .'.php';
            if (!file_exists($file_controller)){
                error_log("[Controller] file not found");
                New Error([
                    'title' => 'Error [Controller]',
                    'message' => 'file not found'
                ]);
                return;
            }

            // VERIFICAR METODO
            $name_controller = "Controllers\\" . ucfirst($url[0]);
            $controller = new $name_controller;
            if (isset($url[1])){
                $method = $url[1];
                if (!method_exists($controller, $method)){
                    error_log('el metodo no existe');
                    New Error([
                        'title' => 'Error [Method]',
                        'message' => 'file not found'
                    ]);
                    return;
                }


                // VERIFICAR PARAMETROS
                // verifica si el metodo requiere parametros
                $refl_method = new ReflectionMethod($controller, $method);
                $refl_params = count($refl_method->getParameters());
                if ($refl_params === 0){
                    $controller->$method();
                    return;
                }

                // si los parametros recibidos son menores a los requeridos
                $url_total = count($url);
                $parameters = $url_total - 2;
                $parameters_required = $refl_params;                
                if ($parameters < $parameters_required){                    
                    error_log("Error[Parameters] the method requires ".$parameters_required . "parameters");
                    new Error([
                        'title' => 'Error [Parameters]',
                        'message' => "the method requires ".$parameters_required . "parameters"
                    ]);
                    return;
                }

                $this->dataview = [];
                $pars = [];
                for ($i=2; $i < $url_total; $i++) { 
                    $pars[] = $url[$i];
                }
                $controller->$method($pars);
            }else {
                echo "method no exist";
            }
        }
    }
    
?>