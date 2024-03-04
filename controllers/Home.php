<?php 
    namespace Controllers;
    use Libs\Controller;

    class Home extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->view->render('index');
            // echo "dfgdgf";
        }

        public function new(){
            $this->view->render('new');
            // echo "dfgdgf";
        }
    }
    