<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/evento_proyeccion_social.php';
require_once '../model/ubigeos.php';

class evento_proyeccion_socialController extends Controller {

    public function index() {
        if (!isset($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!isset($_GET['q'])) {
            $_GET['q'] = "";
        }
        if (!isset($_GET['criterio'])) {
            $_GET['criterio'] = "idevento";
        }
        $obj = new evento_proyeccion_social();
        $data = array();
        $datos = $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=evento_proyeccion_social&action=index', 'query' => $_GET['q']));

        $cols = array("CODIGO", "TEMA DE EVENTO", "TIPO", "FECHA", "LUGAR");
//,"UNIRSE"
        $opt = array("evento_proyeccion_social.DescripcionTipoColegio" => "Tema");
    $data['grilla'] = $this->grilla_E_PS_EU("evento_proyeccion_social", $cols, $data['data']['rows'], $opt, $data['pag'], true, true, false, true,true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/evento_proyeccion_social/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function edit() {
        $ubigeo = new ubigeos();
        $obj = new evento_proyeccion_social();
        $data = array();
        $view = new View();
        $obj = $data['obj'] = $this->getFiels(array("tabla" => "evento", "campo" => "idevento", "idtabla" => $_REQUEST['id']));
        $dat = $data['obj_tipo'] = $this->getFiels(array("tabla" => "tipo_evento", "campo" => "idtipo_evento", "idtabla" => $obj['idtipo_evento']));
        $ubigeos = $ubigeo->getDatos($obj['UBIGEO']);
        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $ubigeos['DEPARTAM']));
        $data['provincia'] = $this->Select_ajax_string_prov(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'ubigeos$', 'filtro' => 'DEPARTAM', 'criterio' => $ubigeos['DEPARTAM'], 'code' => $ubigeos['PROVINCIA'], 'ajax' => false));
        $data['distrito'] = $this->Select_ajax_string_dis(array('id' => 'distrito', 'name' => 'distrito', 'table' => 'ubigeos$', 'filtro' => 'PROVINCIA', 'criterio' => $ubigeos['PROVINCIA'], 'code' => $obj['UBIGEO'], 'ajax' => false));
        $data['sub_eventos']=$this->leer_sub_eventos($_GET['id']);
        $data['pre_actividades']=$this->leer_pre_actividades($_GET['id']);
        $data['tipo_evento'] = $this->Select(array('id' => 'idtipo_evento', 'name' => 'idtipo_evento', 'table' => 'tipo_evento where tipo_evento.idtipo_evento="3" or tipo_evento.idtipo_evento="5"', 'code' => $obj['idtipo_evento']));
        
        
        
        
        $view->setData($data);
        $view->setTemplate('../view/evento_proyeccion_social/_Form.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function show_detalles(){
         $ubigeo = new ubigeos();
        $obj = new evento_proyeccion_social();
        $data = array();
        $view = new View();
        $obj = $data['obj'] = $this->getFiels(array("tabla" => "evento", "campo" => "idevento", "idtabla" => $_REQUEST['id']));
        $dat = $data['obj_tipo'] = $this->getFiels(array("tabla" => "tipo_evento", "campo" => "idtipo_evento", "idtabla" => $obj['idtipo_evento']));
        $ubigeos = $ubigeo->getDatos($obj['UBIGEO']);
        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $ubigeos['DEPARTAM']));
        $data['provincia'] = $this->Select_ajax_string_prov(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'ubigeos$', 'filtro' => 'DEPARTAM', 'criterio' => $ubigeos['DEPARTAM'], 'code' => $ubigeos['PROVINCIA'], 'ajax' => false));
        $data['distrito'] = $this->Select_ajax_string_dis(array('id' => 'distrito', 'name' => 'distrito', 'table' => 'ubigeos$', 'filtro' => 'PROVINCIA', 'criterio' => $ubigeos['PROVINCIA'], 'code' => $obj['UBIGEO'], 'ajax' => false));
        $data['sub_eventos']=$this->leer_sub_eventos($_GET['id']);
        $data['pre_actividades']=$this->leer_pre_actividades($_GET['id']);
        $data['tipo_evento'] = $this->Select(array('id' => 'idtipo_evento', 'name' => 'idtipo_evento', 'table' => 'tipo_evento where tipo_evento.idtipo_evento="3" or tipo_evento.idtipo_evento="5"', 'code' => $obj['idtipo_evento']));
        
       
        $view->setData($data);
        $view->setTemplate('../view/evento_proyeccion_social/_descrDetalles.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    
  public function unirse_evento(){
 
      
 }
    
    public function save() {
        $obj = new evento_proyeccion_social();
        if ($_POST['idevento'] == '') {
            $p = $obj->insert($_REQUEST);
            if ($p[0]) {
                $idevento = $p['idevento'];
                $this->sub_eventos($idevento);
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=evento_proyeccion_social';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                echo $view->renderPartial();
            }
        } else {
            $p = $obj->update($_REQUEST);
            if ($p[0]) {
                header('Location: index.php?controller=evento_proyeccion_social');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=evento_proyeccion_social';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                echo $view->renderPartial();
            }
        }
    }

    public function delete() {
        $obj = new evento_proyeccion_social();
        $p = $obj->delete($_GET['id']);
        if ($p[0]) {
            header('Location: index.php?controller=evento_proyeccion_social');
        } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=evento_proyeccion_social';
            $view->setData($data);
            $view->setTemplate('../view/_Error_App.php');
            $view->setLayout('../template/Layout.php');
            $view->render();
        }
    }

    public function create() {
        $data = array();
        $view = new View();
        $data['tipo_evento'] = $this->Select(array('id' => 'idtipo_evento', 'name' => 'idtipo_evento', 'table' => 'tipo_evento where tipo_evento.idtipo_evento="3" or tipo_evento.idtipo_evento="5"'));
        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $obj->DEPARTAM));
        $data['provincia'] = $this->Select(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'vpovincia', 'code' => $obj->PROVINCIA));
//        $data['distrito'] = $this->Select(array('id' => 'distrito', 'name' => 'distrito', 'table' => 'ubigeos$', 'code' => $obj->UBIGEO));


        $view->setData($data);
        $view->setTemplate('../view/evento_proyeccion_social/_Form.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function getListaProvincias() {
        $ofic = $this->Select_ajax_string(array('id' => 'idcriterio', 'name' => 'idcriterio', 'table' => 'ubigeos$', 'filtro' => 'DEPARTAM', 'criterio' => $_POST['departamento']));
        echo $ofic;
    }

    public function getListaDistritos() {
        $ofic = $this->Select_ajax_string_dis(array('id' => 'idcriterio', 'name' => 'idcriterio', 'table' => 'ubigeos$', 'filtro' => 'PROVINCIA', 'criterio' => $_POST['provincia'], 'ajax' => true));
        echo $ofic;
    }

}

?>