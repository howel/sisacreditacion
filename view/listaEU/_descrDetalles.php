<script>
    $(function () {
        $("#tabs").tabs();
        $("#addRow").css("display","none");
        $("#legendsub_evento").css("display","none");
        $("#addRowSA").css("display","none");
        $("#legendpre_actividad").css("display","none");
        $('#profesores').DataTable({
        "paging":   true,
        "sPaginationType": "full_numbers",
        "bJQueryUI":true,
        "language": {
            "lengthMenu": "filas _MENU_ ",
            "zeroRecords": "No hay registros que coincidan con la busqueda",
            "info": "Mostrando _PAGE_ de _PAGES_ entradas",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
    });
</script>



<div id="tabs">
    <ul>
        <li><a href="#tabs-1">DATOS GENERALES</a></li>
        <li><a href="#tabs-2">SUB EVENTOS</a></li>
        <li><a href="#tabs-3">PRE ACTIVIDADES</a></li>
        <li><a href="#tabs-4">Docentes</a></li>
        <li><a href="#tabs-5">Alumnos</a></li>
        <li><a href="#tabs-6">Externos</a></li>
    </ul>
    <div id="tabs-1" align='center'>

        <table class="table table-hover" style="width: 80%">
            <tr class="success">
                <td >TEMA DEL EVENTO:</td>
                <td><?php echo $obj['tema']; ?></td>
            </tr>

            <tr class="success">
                <td >TIPO DEL EVENTO:</td>
                <td><?php echo utf8_encode($obj_tipo['descripcion']); ?></td>
            </tr>

            <tr class="success">
                <td >FECHA:</td>
                <td><?php echo $obj['fecha']; ?></td>
            </tr>

            <tr class="success">
                <td >LUGAR:</td>
                <td><?php echo $obj['lugar']; ?></td>
            </tr>

            <tr class="success">
                <td >DEPARTAMENTO:</td>
                <td><?php echo $departamento; ?></td>
            </tr>

            <tr class="success">
                <td >PROVINCIA:</td>
                <td>
<!--                   <span class="input-group-addon"><big><strong for="provincia"  style="width: 80px">Provincia</strong></big></span>-->
                    <?php
                    echo $ubigeos['PROVINCIA'] . 'Miriamcitaknflenf♥';
//                              <?php echo $departamento; 
                    ?>

                    ?> 
                </td>
            </tr>

            <tr class="success">
                <td >DISTRITO:</td>
                <td>
                    <!--<span class="input-group-addon"><big><strong>Distrito</strong></big></span>-->
                    <?php if (!isset($distrito)) { ?>
                        <select id="distrito" name="distrito" style="width: 100%;"class="ui-corner-all text ui-widget-content">
                            <!--<option value="">...</option>-->
                        </select>  
                        <?php
                    } else {
                        echo $distrito;
                    }
                    ?> 
                </td>
            </tr>

        </table>
    </div>


    <div id="tabs-2" align='center'>

        <div id="evento_sub_eventos">
            <?php echo $sub_eventos; ?>
        </div>
    </div>



    <div id="tabs-3" align='center'>

        <div id="pre_actividades">
            <?php echo $pre_actividades; ?>
        </div>
    </div>


    <div id="tabs-4" align='center'>
       <?php echo "<pre>";print_r($profesores);?>
        <table id="profesores" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>CodigoProfesor</th>
                            <th>NombreProfesor</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Cargo</th>
                            <th>EStado de Asistemcia</th>
                            <th>Id Evento</th> 
                            <th>Tema E vento</th>
                            <th>Costo del Evento</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>CodigoProfesor</th>
                            <th>NombreProfesor</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Cargo</th>
                            <th>EStado de Asistemcia</th>
                            <th>Id Evento</th> 
                            <th>Tema E vento</th>
                            <th>Costo del Evento</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($alumnos as $key => $value){ ?>
                            <tr>
                            <td><?php echo $value['CodigoProfesor']; ?></td>
                            <td><?php echo $value['NombreProfesor']; ?></td>
                            <td><?php echo $value['ApellidoPaterno']; ?></td>
                            <td><?php echo $value['ApellidoMaterno']; ?></td>
                            <td><?php echo $value['descripcion']; ?></td>
                            <td><?php echo $value['asistencia_docente']; ?></td>
                            <td><?php echo $value['idevento']; ?></td>
                            <td><?php echo $value['tema']; ?></td>
                            <td><?php echo $value['costo']; ?></td>
                            <td></td>
                        </tr>
                            
                       <?php } ?>
                    </tbody>
        </table>
    </div>


    <div id="tabs-5" align='center'>
        <?php echo "<pre>";print_r($externos);?>
        <table id="externos" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>CodigoExterno</th>
                            <th>Nombre Alum</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Cargo</th>
                            <th>EStado de Asistemcia</th>
                            <th>Id Evento</th> 
                            <th>Tema Evento</th>
                            <th>Costo del Evento</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>CodigoProfesor</th>
                            <th>NombreProfesor</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Cargo</th>
                            <th>EStado de Asistemcia</th>
                            <th>Id Evento</th> 
                            <th>Tema E vento</th>
                            <th>Costo del Evento</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($externos as $key => $value){ ?>
                            <tr>
                            <td><?php echo $value['id_externos']; ?></td>
                            <td><?php echo $value['nombre']; ?></td>
                            <td><?php echo $value['apellido_paterno']; ?></td>
                            <td><?php echo $value['apellido_materno']; ?></td>
                            <td><?php echo $value['descripcion']; ?></td>
                            <td><?php echo $value['asistencia_externo']; ?></td>
                            <td><?php echo $value['idevento']; ?></td>
                            <td><?php echo $value['tema']; ?></td>
                            <td><?php echo $value['costo']; ?></td>
                            <td></td>
                        </tr>
                            
                       <?php } ?>
    </div>
    
    <div id="tabs-6" align='center'>
       <?php echo "<pre>";print_r($externos);?>
        <table id="externos" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>CodigoAlumno</th>
                            <th>Nombre Alum</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Cargo</th>
                            <th>EStado de Asistemcia</th>
                            <th>Id Evento</th> 
                            <th>Tema Evento</th>
                            <th>Costo del Evento</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>CodigoProfesor</th>
                            <th>NombreProfesor</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Cargo</th>
                            <th>EStado de Asistemcia</th>
                            <th>Id Evento</th> 
                            <th>Tema E vento</th>
                            <th>Costo del Evento</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($alumnos as $key => $value){ ?>
                            <tr>
                            <td><?php echo $value['CodigoAlumno']; ?></td>
                            <td><?php echo $value['NombreAlumno']; ?></td>
                            <td><?php echo $value['ApellidoPaterno']; ?></td>
                            <td><?php echo $value['ApellidoMaterno']; ?></td>
                            <td><?php echo $value['descripcion']; ?></td>
                            <td><?php echo $value['asistencia_alumno']; ?></td>
                            <td><?php echo $value['idevento']; ?></td>
                            <td><?php echo $value['tema']; ?></td>
                            <td><?php echo $value['costo']; ?></td>
                            <td></td>
                        </tr>
                            
                       <?php } ?>
    </div>
</div>




