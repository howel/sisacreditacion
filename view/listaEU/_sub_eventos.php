<?php include("../lib/functions.php"); ?>
<script type="text/javascript" >
    $(function() {
//$('#tsub_eventos').DataTable({
//        "paging":   true,
//        "sPaginationType": "full_numbers",
//        "bJQueryUI":true
//    } );
var t=$('#tsub_eventos').DataTable({
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
     $("#addRow").click(function() {
     t.row.add( [
            'hola','hola','hola','hola','hola','hola','hola','hola','hola','hola'
        ] ).draw();
    } );
    });
</script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<link href="css/formproyecto.css" rel="stylesheet" type="text/css" />


<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="evento_proyeccion_social" />
    <input type="hidden" name="action" value="save__preactividades" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 100%; ">
            <fieldset class="ui-corner-all" >
                <legend id="legendsub_evento" align="left">REGISTRO DE SUB EVENTOS</legend> 
                 <button type="button" id="addRow" class="btn btn-info"><img alt="" src="images/add.png" />Agregar</button>
                <br>
                <table id="tsub_eventos" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>idevento</th>
                            <th>tema</th>
                            <th>idtipo_evento</th>
                            <th>CodigoSemestre</th>
                            <th>fecha</th>
                            <th>CodigoProfesor</th>
                            <th>lugar</th>
                            <th>UBIGEO</th>
                            <?php if($_REQUEST['action']!='show_detalles'){
                                echo "<th></th>
                            <th></th> ";
                            }
                            ?>
                           
                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>idevento</th>
                            <th>tema</th>
                            <th>idtipo_evento</th>
                            <th>CodigoSemestre</th>
                            <th>fecha</th>
                            <th>CodigoProfesor</th>
                            <th>lugar</th>
                            <th>UBIGEO</th>
                              <?php if($_REQUEST['action']!='show_detalles'){
                                echo "<th></th>
                            <th></th> ";
                            }
                            ?>
                            
                            
                         
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php // echo "<div align='left'><pre>";print_r($rows); ?>
                        <?php foreach ($rows as $key => $value)
                        {
                            echo "<tr>";
                            echo "<td>".$value['idevento']."</td>";
                            echo "<td>".$value['tema']."</td>";
                            echo "<td>".$value['idtipo_evento']."</td>";
                            echo "<td>".$value['CodigoSemestre']."</td>";
                            echo "<td>".$value['fecha']."</td>";
                            echo "<td>".$value['CodigoProfesor']."</td>";
                            echo "<td>".$value['lugar']."</td>";
                            echo "<td>".$value['UBIGEO']."</td>";
                            if($_REQUEST['action']!='show_detalles'){
                            echo "<td><a href='' class='glyphicon glyphicon-edit'><span class='glyphicon glyphicon-trash'></span></td>";
                            echo "<td><a href='javascript:' class='glyphicon glyphicon-trash'></td>";
                            }
                            echo"</tr>";
                        }?>
                    <tbody>
                </table>




            </fieldset> 

        </div>

    </div>
</form>
<div id="pre_actividades"></div>

