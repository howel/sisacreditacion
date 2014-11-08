
<script type="text/javascript" >
    $(function() {
var t =$('#tsub_eventos_preact').DataTable({
        "paging":   true,
        "sPaginationType": "full_numbers",
        "bJQueryUI":true,
        "zeroRecords": "No Hay Redultados"
    } );
    
   
    $("#addRow").click(function() {
       
      $("#tsub_eventos_preact  tbody").append("<tr><td>sry</td></tr>")
    } );
    });
</script>


<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="evento_proyeccion_social" />
    <input type="hidden" name="action" value="save__preactividades" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 100%; ">
            <fieldset class="ui-corner-all" >
                <legend align="left">REGISTRO DE PRE ACTIVIDADES</legend>
                <button type="button" id="addRow">Agregar</button>
                <table id="tsub_eventos_preact" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>id_pc_evento</th>
                            <th>idevento</th>
                            <th>fecha_inicio</th>
                            <th>fecha_termino</th>
                            <th>costo</th>
                            <th>indicador</th>
                            <th>unidad</th>
                            <th>pre_actividad</th>
                            <th></th>
                            <th></th>
                           
                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>id_pc_evento</th>
                            <th>idevento</th>
                            <th>fecha_inicio</th>
                            <th>fecha_termino</th>
                            <th>costo</th>
                            <th>indicador</th>
                            <th>unidad</th>
                            <th>pre_actividad</th>
                            <th></th>
                            <th></th>
          
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php // echo "<div align='left'><pre>";print_r($rows); ?>
                        <?php foreach ($rows as $key => $value)
                        {
                            echo "<tr>";
                            echo "<td>".$value['id_pc_evento']."</td>";
                            echo "<td>".$value['idevento']."</td>";
                            echo "<td>".$value['fecha_inicio']."</td>";
                            echo "<td>".$value['fecha_termino']."</td>";
                            echo "<td>".$value['costo']."</td>";
                            echo "<td>".$value['indicador']."</td>";
                            echo "<td>".$value['unidad']."</td>";
                            echo "<td>".$value['pre_actividad']."</td>";
                            echo "<td><a href='' class='glyphicon glyphicon-edit'><span class='glyphicon glyphicon-trash'></span></td>";
                            echo "<td><a href='javascript:' class='glyphicon glyphicon-trash'></td>";
                           
                            echo"</tr>";
                        }?>
                    <tbody>
                </table>




            </fieldset> 

        </div>

    </div>
</form>
<div id="pre_actividades"></div>