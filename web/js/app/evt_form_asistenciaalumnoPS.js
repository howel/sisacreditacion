$(function() {
    $(".asig").click(function() {
        cadena=$(this).val();
        var pedazo = cadena.split(",");
        idevento=pedazo[0];
        evento=pedazo[1];
         $.post('index.php', 'controller=asistenciaalumnoPS&action=tomar_asistencia_eventoPS&idevento='
                 +idevento+'&evento='+evento, function(data) {
            console.log(data);
            $("#asistencia_evento").empty().append(data);
        });
        
//        $("#seleccionado").change(function(){
//          seleccionado=$(this).val();    
//        })
       
    });
   
    $("#save").click(function() {
        bval = true;
        
        if (bval) {
            $("#frm").submit();
        }
        return false;
    });
});

