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
                                
                              echo $ubigeos['PROVINCIA'].'Miriamcitaknflenf♥'; 
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
</div>
 
 
 

