<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/asistenciaalumnoPS.php';

class asistenciaalumnoPSController extends Controller {

    public function index() {
        if (!isset($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!isset($_GET['q'])) {
            $_GET['q'] = "";
        }
        if (!isset($_GET['criterio'])) {
            $_GET['criterio'] = "evento.tema";
        }

        $obj = new asistenciaalumnoPS();
        $semestre_ultimo = $this->mostrar_semestre_ultimo();
        $data = array();
        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio'], $semestre_ultimo,$_SESSION['idusuario']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination2(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=asistenciaalumnoPS&action=index', 'query' => $_GET['q']));
        $cols = array("CODIGO", "TEMA", "TIPO EVENTO", "Fecha");

        $data['grilla'] = $this->grilla("asistenciaalumnoPS", $cols, $data['data']['rows'], $opt, $data['pag'], false, false, false, false, true);


        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/asistenciaalumnoPS/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    
     public  function mostar_lista_asistenciasPS(){ 
         $obj = new asistenciaalumnoPS();
        $data=array();
        $idevento=$data['idevento']=$_REQUEST['idevento']  ;
        $seleccionado=$data['seleccionado']=$_REQUEST['seleccionado'];
        if($seleccionado==3){
            $data['row']=$obj->mostar_lista_ps_externo($idevento);
               $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/asistenciaalumnoPS/lista_externos.php');
        echo $view->renderPartial();
        }
        if($seleccionado==2){
            $data['row']=$obj->mostar_lista_ps_alumnos($idevento);
              $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/asistenciaalumnoPS/lista_alumnos.php');
        echo $view->renderPartial();
        }
        if($seleccionado==1){
            $data['row']=$obj->mostar_lista_ps_docente($idevento);
              $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/asistenciaalumnoPS/lista_docentes.php');
        echo $view->renderPartial();
        }
      
    }
    
    public function tomar_asistencia_eventoPS() {
              
        $obj = new asistenciaalumnoPS();
        $data=array();
        $data['idevento']=$_REQUEST['idevento']  ;
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/asistenciaalumnoPS/tomar_asistencia_eventoPS.php');
        echo $view->renderPartial();
        
    }

    
public function save_asistencias_externos(){
//    echo 'hola';
//print_r($_POST);exit;
        $obj = new asistenciaalumnoPS();      
            $p = $obj->update_externos($_POST);
            if ($p[0]){
                header('Location: index.php?controller=asistenciaalumnoPS');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=asistenciaalumnoPS';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        
    }
    public function save_asistencias_alumnos(){
//    echo 'hola';
//print_r($_POST);exit;
        $obj = new asistenciaalumnoPS();      
            $pa = $obj->update_alumnos($_POST);
            if ($pa[0]){
                header('Location: index.php?controller=asistenciaalumnoPS');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $pa[1];
            $data['url'] =  'index.php?controller=asistenciaalumnoPS';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        
    }
        public function save_asistencias_docentes(){
  
        $obj = new asistenciaalumnoPS();      
            $pd = $obj->update_docente($_POST);
            if ($pd[0]){
                header('Location: index.php?controller=asistenciaalumnoPS');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $pd[1];
            $data['url'] =  'index.php?controller=asistenciaalumnoPS';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        
    }
}

?>