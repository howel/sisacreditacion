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

    function get_profesores($idevento) {
        $sql="SELECT
    detalle_asistencia_docente.CodigoProfesor,
    profesores.NombreProfesor,
    profesores.ApellidoPaterno,
    profesores.ApellidoMaterno,
    cargo_asistencia_evento.descripcion,
    detalle_asistencia_docente.asistencia_docente,
    evento.idevento,
    evento.tema,
    detalle_asistencia_docente.costo

    FROM
    detalle_asistencia_docente ,
    profesores ,
    cargo_asistencia_evento,
    evento

    WHERE detalle_asistencia_docente.asistencia_docente='1'  AND detalle_asistencia_docente.costo='0' AND
    profesores.CodigoProfesor=detalle_asistencia_docente.CodigoProfesor AND detalle_asistencia_docente.idevento=evento.idevento AND
    cargo_asistencia_evento.id_cargo=detalle_asistencia_docente.id_cargo and evento.idevento= '".$idevento."'";
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function get_alumnos($idevento) {
        $sql="SELECT
            detalle_asistencia_alumno.CodigoAlumno,
            alumnos.NombreAlumno,
            alumnos.ApellidoPaterno,
            alumnos.ApellidoMaterno,
            detalle_asistencia_alumno.asistencia_alumno
            detalle_asistencia_alumno.id_cargo,
            cargo_asistencia_evento.descripcion,
            detalle_asistencia_alumno.idevento,
            evento.tema,
            detalle_asistencia_alumno.costo,
            FROM
            alumnos ,
            detalle_asistencia_alumno ,
            evento ,
            cargo_asistencia_evento

            WHERE detalle_asistencia_alumno.asistencia_alumno='1'  AND detalle_asistencia_alumno.costo='0' AND
            alumnos.CodigoAlumno=detalle_asistencia_alumno.CodigoAlumno AND detalle_asistencia_alumno.idevento=evento.idevento AND
            cargo_asistencia_evento.id_cargo=detalle_asistencia_alumno.id_cargo and evento.idevento= '".$idevento."'";
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_externos($idevento) {
        $sql="SELECT
            detalle_asistencia_externo.id_externos,
            externos.nombre,
            externos.apellido_paterno,
            externos.apellido_materno,
            detalle_asistencia_externo.asistencia_externo,
            detalle_asistencia_externo.id_cargo,
            cargo_asistencia_evento.descripcion,
            detalle_asistencia_externo.idevento,
            evento.tema,
            detalle_asistencia_externo.costo
            FROM
            evento ,
            cargo_asistencia_evento ,
            externos ,
            detalle_asistencia_externo
            WHERE detalle_asistencia_externo.asistencia_externo='1'  AND detalle_asistencia_externo.costo='0' AND
            externos.id_externos=detalle_asistencia_externo.id_externos AND detalle_asistencia_externo.idevento=evento.idevento AND
            cargo_asistencia_evento.id_cargo=detalle_asistencia_externo.id_cargo and evento.idevento= '".$idevento."'";
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    
    
    function edit($id) {
        $stmt = $this->db->prepare("SELECT * FROM evento WHERE idevento=:id");
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
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
        return array($p1, $p2[2], "idevento" => $id);
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
