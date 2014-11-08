<?php

include_once("../lib/dbfactory.php");

class evento_proyeccion_social extends Main {

    function index($query, $p, $c) {
        $sql = ' SELECT
                        evento.idevento,
                            evento.tema,
                            tipo_evento.descripcion,
                            evento.fecha,
                            evento.lugar
                            FROM
                            evento
                            INNER JOIN tipo_evento ON tipo_evento.idtipo_evento = evento.idtipo_evento
                        where evento.idtipo_evento="3" or  evento.idtipo_evento="5" and ' . $c . ' like :query';
//        echo $sql;exit;
        $param = array(array('key' => ':query', 'value' => "%$query%", 'type' => 'STR'));
        $data['total'] = $this->getTotal($sql, $param);
        $data['rows'] = $this->getRow($sql, $param, $p);
        $data['rowspag'] = $this->getRowPag($data['total'], $p);
        return $data;
    }
    
    function mostrar_ultimo_semestre() {
        $semestre = $this->db->query("SELECT
                                    distinct
                                    max(detalle_matricula.CodigoSemestre) as semestre_actual
                                    FROM
                                    detalle_matricula
                                    ");
        $ct = $semestre->fetch();
        $semestre = $ct['semestre_actual'];
        return $semestre;
    }
   
  
            function edit($id) {
        $stmt = $this->db->prepare("SELECT * FROM evento WHERE idevento=:id");
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function InsertDet($_P) {
        $fecha=  date('Y/m/d');
        $estado=0;
        $stmt = $this->db->prepare("INSERT INTO detalle_alumno_evento VALUES(:idevento, :fecha, :CodigoAlumno, :estado, :CodigoSemestre, :mensaje)");
        $stmt->bindValue(':idevento',$_P['codigo'], PDO::PARAM_INT );
        $stmt->bindValue(':fecha',$fecha, PDO::PARAM_STR );
        $stmt->bindValue(':CodigoAlumno',$_P['alumno'], PDO::PARAM_STR);
        $stmt->bindValue(':estado',$estado, PDO::PARAM_INT );
        $stmt->bindValue(':CodigoSemestre',$_P['semestre'], PDO::PARAM_STR );
        $stmt->bindValue(':mensaje',$_P['mensaje'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
function InsertDet_profesor($_P) {
        $fecha=  date('Y/m/d');
        $estado=0;
        $stmt = $this->db->prepare("INSERT INTO detalle_profesor_evento VALUES(:idevento, :fecha, :CodigoProfesor, :estado, :CodigoSemestre, :mensaje)");
        $stmt->bindValue(':idevento',$_P['codigo'], PDO::PARAM_INT );
        $stmt->bindValue(':fecha',$fecha, PDO::PARAM_STR );
        $stmt->bindValue(':CodigoProfesor',$_P['profesor'], PDO::PARAM_STR);
        $stmt->bindValue(':estado',$estado, PDO::PARAM_INT );
        $stmt->bindValue(':CodigoSemestre',$_P['semestre'], PDO::PARAM_STR );
        $stmt->bindValue(':mensaje',$_P['mensaje'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    function insert($_P) { 
//        if ($_SESSION['cargo'] != 'Presidente' || $_SESSION['comicion'] != 'COMISION ESPECIAL DE TUTORIA') {
//            $cod_profesor = $_SESSION['idusuario'];
//        }
//        if ($_P['crear_modo_sin_cargo'] == true) {
//            $cod_profesor = $_SESSION['idusuario'];
//        }
        $sentencia = $this->db->query("SELECT MAX(idevento) as cant from evento");
        $ct = $sentencia->fetch();
        $id = 1 + (int) $ct['cant'];
        $semestre_ultimo = $this->mostrar_semestre_ultimo();
        $sql = $this->Query("sp_evento_proyeccion_social_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $id, PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['tema'], PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idtipo_evento'], PDO::PARAM_INT);
        $stmt->bindValue(':p4', $semestre_ultimo, PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha'], PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_SESSION['idusuario'], PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['lugar'], PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['distrito'], PDO::PARAM_STR);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1, $p2[2],"idevento"=>$id);
    }

    function update($_P) {
        if ($_SESSION['cargo'] != 'Presidente' && $_SESSION['comicion'] != 'COMISION ESPECIAL DE TUTORIA') {
            $cod_profesor = $_SESSION['idusuario'];
        }
        $semestre_ultimo = $this->mostrar_semestre_ultimo();
        $sql = $this->Query("sp_evento_proyeccion_social_iu(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $_P['idevento'], PDO::PARAM_INT);
       $stmt->bindValue(':p2', $_P['tema'], PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idtipo_evento'], PDO::PARAM_INT);
        $stmt->bindValue(':p4', $semestre_ultimo, PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha'], PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_SESSION['idusuario'], PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['lugar'], PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['distrito'], PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1, $p2[2]);
    }

    function delete($p) {
        $sql = $this->Query("sp_evento_sd(1,:p1)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1, $p2[2]);
    }

}

?>
