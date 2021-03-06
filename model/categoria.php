<?php
include_once("../lib/dbfactory.php");
class categoria extends Main{   
    
    public $opt;
    function index($query,$p,$c) {        
        $sql = "SELECT
                    CodigoCategoria,
                    DescripcionCategoria
                    FROM
                    categoria
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] = $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM categoria WHERE CodigoCategoria = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($_P ) {
           
         $sentencia=$this->db->query("SELECT MAX(CodigoCategoria) as cant from categoria");         
         $ct=$sentencia->fetch();
           $a=(int)$ct['cant'];
           if ($a<9){
               $xd=1+ $a;
               $xd="0".$xd;
           }else{
               $xd=1+ $a;
           }
         
         $xd=(string)$xd;
        $sql = $this->Query("sp_categoria_iu(0,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1',$xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionCategoria'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    
    
    function update($_P ) {
        
        $sql = $this->Query("sp_categoria_iu(1,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['CodigoCategoria'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionCategoria'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
         $sql = $this->Query("sp_categoria_sd(1,:p1)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
