<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>


 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">DATOS GENERALES</a></li>
    <li><a href="#tabs-2">SUB EVENTOS</a></li>
    <li><a href="#tabs-3">PRE ACTIVIDADES</a></li>
    <li><a href="#tabs-4">Docentes</a></li>
    <li><a href="#tabs-5">Alumnos</a></li>
    <li><a href="#tabs-6">unirse</a></li>

  </ul>
   <div id="tabs-1" align='center'>
            
      <table class="table table-hover" style="width: 80%">
            <tr class="success">
                <td >TEMA DEL EVENTO:</td>
                <td><?php echo $obj['tema']; ?></td>
            </tr>
            
            <tr class="success">
                <td >TIPO DEL EVENTO:</td>
                <td><?php echo $tipo_evento; ?></td>
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
                                
                              echo $ubigeos['PROVINCIA'].'jewel♥'; 
//                              <?php echo $departamento; ?>
                                 
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
  <div id="tabs-2"> 
                <div id="evento_sub_eventos">
                    <?php echo $sub_eventos;?>
                </div>
  </div>
    
  <div id="tabs-3">
        <div id="pre_actividades">
        <?php echo $pre_actividades;?>
        </div>
  </div>
    
    <div id="tabs-4">
    
    </div>
    
    <div id="tabs-5">
    
    </div>
    
     <div id="tabs-6" align='center'>
         <form action="index.php" id="frm" method="POST">
             <input type="hidden" name="controller" value="evento_proyeccion_social" />
             <input type="hidden" name="action" value="insertarDetalle_profesor" />
            <table class="table table-hover" style="width: 50%">
              <H2> DESEAS UNIRTE?</H2>
              <textarea   rows="5" id="mensaje" name="mensaje" cols="30"> </textarea>
              <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                              <span style="font-size: 10px; color: red">*Mensaje no es obligatorio</span>
                              <input type="hidden" id="codigo" name="codigo" value="<?php echo $id;?>">
                              <input type="hidden" id="semestre" name="semestre" value="<?php echo $semestre?>">
                              <input type="hidden" id="profesor" name="profesor" value="<?php echo $_SESSION['idusuario'];?>">
                              <br>
                              <button type="submit" name="save" class="btn btn-success cerrar2">Aceptar</button>
                              <a href="index.php?controller=evento_proyeccion_social&action=index_profesor"><button type="button" class="btn btn-danger cerrar2">Cancelar</button></a>
              </div>
            </table>
         </form>
  </div>
</div>
 
 
 

