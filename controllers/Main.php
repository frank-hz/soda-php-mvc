<?php 
    namespace Controllers;
    use Libs\Controller;

    class Main extends Controller {
        public function __construct(){
            parent::__construct();
            $this->view->render('main');
        }
    }
    