$(function() {
    $(".asig").click(function() {//#asir onchenje lo mismo  al igual que el index
        cadena=$(this).val();
        var pedazo = cadena.split(",");//Separo el codigo y el nombre
        idevento=pedazo[0];// Capturo codigo
        evento=pedazo[1];// Capturo tema
        evento = evento.toUpperCase();
         $.post('index.php', 'controller=asistenciaalumnoEU&action=tomar_asistencia_eventoEU&idevento='
                 +idevento+'&evento='+evento, function(data) {
            console.log(data);
            $("#asistencia_evento").empty().append(data);
        });
       
   // });
//$("#seleccionado").change(function() {
 //  seleccionado=$(this).val();
});
   $("#save").click(function() {
        bval = true;
        
        if (bval) {
            $("#frm").submit();
        }
        return false;
    });
});

