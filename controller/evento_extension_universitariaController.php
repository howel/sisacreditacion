<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/evento_extension_universitaria.php';

class evento_extension_universitariaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="idevento";}
        $obj = new evento_extension_universitaria();
        $data = array();  
        $datos=$data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=evento_extension_universitaria&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","TEMA DE EVENTO","TIPO", "FECHA", "LUGAR","PREACTIVIDADES");               
        
        $opt = array("evento_extension_universitaria.DescripcionTipoColegio"=>"Nombre Tipo Colegio");
        $data['grilla'] = $this->grilla("evento_extension_universitaria",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/evento_extension_universitaria/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new TipoColegio();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipocolegioPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipocolegio','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/evento_extension_universitaria/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new tipocolegio();
        if ($_POST['CodigoTipoColegio']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipocolegio');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipocolegio';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipocolegio');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipocolegio';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new tipocolegio();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=tipocolegio');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=tipocolegio';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    
    
    
    public function create() {
        $data = array();
        $view = new View();
        $data['tipo_evento'] = $this->Select(array('id' => 'idtipo_evento', 'name' => 'idtipo_evento', 'table' => 'tipo_evento where tipo_evento.idtipo_evento="4" or tipo_evento.idtipo_evento="6"'));
        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $obj->DEPARTAM));
        $data['provincia'] = $this->Select(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'vpovincia', 'code' => $obj->PROVINCIA));
        
        if($_SESSION['perfil']=='PROFESOR'){$WHERE=" where tipo_evento.idtipo_evento=4" ;} ;
         if($_SESSION['idperil']==4){$WHERE=" where tipo_evento.idtipo_evento= '4' or tipo_evento.idtipo_evento='6'";} ;
         
         
        $data['tipocolegioPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipocolegio'));
        $view->setData($data);
        $view->setTemplate( '../view/evento_extension_universitaria/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
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