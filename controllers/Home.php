<?php 
    namespace Controllers;
    use Libs\Controller;

    class Home extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public function index($parameter){
            $this->view->render('index',['pages' => ['home','list','config']]);
            // var_dump($parameter);
            // echo "43234";
        }

        public function new($p){
            $this->view->render('new');
            // echo "dfgdgf";
        }
    }
    