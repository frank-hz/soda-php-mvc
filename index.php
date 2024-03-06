<?php
    // Establecer zona horaria
    date_default_timezone_set('America/Lima');

    // Configuracion de errores

    // Establece que se muestren todos los errores
    error_reporting(E_ALL);
    // Ignora errores repetidos
    ini_set('ignore_repeat_errors', TRUE);
    // Evita que se muestren los errores en pantalla
    ini_set('display_errors', TRUE);
    // ini_set('display_errors', FALSE);
    // Establece que se guarden los errores en un archivo
    ini_set('log_erros', TRUE);
    // Define el archivo en el que se guardaran los errores
    ini_set('error_log', 'debug.log');

    
    require_once 'config/config.php';
    require_once 'libs/app.php';
    require_once 'libs/error.php';

    spl_autoload_register(function($class){
        /* convierte '$class' en array
            asigna el array en variables */
        list($folder, $file) = explode("\\", $class); 

        /* reasigna el valor de '$class' con 
            el resultado concatenacion de valores convirtiendo */
        $class = lcfirst($folder) . '/' . lcfirst($file);

        // crea la url del archivo a buscar 
        $file_class = __DIR__ . "/$class.php";

        // verifica si existe el archivo
        if (!file_exists($file_class)){
            // carga el archivo 
            // echo "archivo no existe";
            error_log('');
            return;
        }
        require_once $file_class;
    });

    new App();
?>