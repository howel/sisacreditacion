<?php include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_asistenciaalumnoEU.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script>
    $(function() {
        $("#seleccionado").change(function() {
         var seleccionado = $(this).val();
         idevento=$("#idevento").val();
         $.post('index.php', 'controller=asistenciaalumnoEU&action=mostar_lista_asistenciasEU&seleccionado='+seleccionado+'&idevento='+idevento, function(data) {
            console.log(data);
            $("#asistencia_segun_tipoEU").empty().append(data);
        });

        });  
     
    });
</script>
<input type="hidden" id="idevento" value="<?php echo $idevento; ?>">
<div class="div_container"> 
    <select id="seleccionado">
        <option value="#"> Seleccione...</option>
        <option value="1"> Docente...</option>
        <option value="2"> Alumno...</option>
        <option value="3"> Externo...</option>
    </select>
</div>
<div id="asistencia_segun_tipoEU">
    
</div>