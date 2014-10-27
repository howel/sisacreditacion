<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/nuevos.php';
class nuevosController extends Controller {    
    public function index() 
    { 
        $obj = new nuevos();
        $data = array(); 
        $data['dat']="erick";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/nuevo/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    
}
?>