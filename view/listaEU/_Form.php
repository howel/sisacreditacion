<script type="text/javascript" src="js/app/evt_form_evento_proyeccion_social.js"  ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
    <?php // echo "<div align='left'><pre>";print_r($obj);echo "<br><pre>";print_r($obj_tipo);echo "</div>"?>
    <h6 class="ui-widget-header">Registro de Evento </h6>

 <style>

    fieldset{
        
    -webkit-border-radius: 0 0 20px 20px;
    -moz-border-radius: 0 0 20px 20px;
    border-radius: 0 0 20px 20px;
         border: purple 5px dotted; 
    padding: 15px 20px;
         }
         .transparente{
         opacity: 0.8;
         -moz-opacity: 0.8;
        filter: alpha(opacity=80);
        -khtml-opacity: 0.8;
        }
        strong{
            color:#330099;
            font-family: Comic Sans;
            
        }
        h2 {
    
       
    color: #330099;
    font-size: 28px;
    padding: 5px 5px;
}

         h2 span[class*="fontawesome-"] {
    margin-right: 14px;
}
       
        
      
</style>



    <form id="frm" action="index.php" method="POST">
        <input type="hidden" name="controller" value="evento_proyeccion_social" />
        <input type="hidden" name="action" value="save" />
        <div class="contFrm ui-corner-all" style="background-image:url(css/images_eapisi/ima.jpg);">
            <div class="transparente" class="contenido" style="margin:0 auto; width: 500px; ">
<!--               <fieldset style="border:6px groove #ccc; background-image:url(css/images_eapisi/fondo.gif) ;"  class="ui-corner-all" >-->
            
                      
                   <fieldset>
                   <table width="100"><legend><h2>Datos</h2></legend>
                        
                        <div  class="tab-content col-md-1" >
                          <tr>
                            <div class="col-md-12">
                               


                                <div class="col-md-6">
                                    <big><span class="input-group-addon"><strong for="idevento" >Codigo</strong></span></big>
                                    <input type="text" class="form-control oblig" placeholder="Codigo" name="idevento" id="idevento" value="<?php echo $obj['idevento']; ?>" readonly>
                                </div> 








                                <div class="col-md-6">
                                    <span class="input-group-addon"><big><strong for="tema" >Tema del evento</strong></span></big>
                                    <input type="text" class="form-control oblig" placeholder="Tema" name="tema" id="tema" value="<?php echo $obj['tema']; ?>">
                                </div>
                            </div>
                       



                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <span class="input-group-addon"><big><strong>Lugar</strong></big></span>
                                    <input id="lugar" maxlength="100" name="lugar" class="text ui-widget-content ui-corner-all" placeholder="Lugar" style=" width: 185px; text-align: left;" value="<?php echo $obj['lugar']; ?>">
                                </div>
                              
                                



                                                    
                            <div class="col-md-6">
                       <big><span class="input-group-addon"><strong for="fecha" >Fecha</strong></span></i></big>
                          
                           
                                        <input type="text" class="form-control oblig" placeholder="Fecha" name="fecha" id="fecha" value="<?php echo $obj['fecha']; ?>">
                                
                       
                                </div>
                            </div>  





                       <div class="col-md-12">
                                <div class="col-md-6">
                                    <span class="input-group-addon"><big> <strong for="tipo_evento" style="width: 80px"> Tipo de Evento</strong></big></span>

                                <?php echo $tipo_evento; ?>
                                </div>




                          
                            
                           


                            <div class="col-md-6">
                                <span class="input-group-addon"><big><strong>Departamento</strong></big></span>
                                <?php echo $departamento; ?>
                           </div>



                          
                               </div>
                      









                          <div class="col-md-12">






                             <div class="col-md-6">
                             <span class="input-group-addon"><big><strong for="provincia"  style="width: 80px">Provincia</strong></big></span>
                                <?php if (!isset($provincia)) { ?>
                                    <select id="provincia" name="provincia" class="ui-corner-all text ui-widget-content" style="width: 161px;">
                                        <option value="">...</option>
                                    </select>
                                    <?php
                                } else {
                                    echo $provincia;
                                }
                                ?>
                            </div> 
                                

                        <div class="col-md-6">
                        <span class="input-group-addon"><big><strong>Distrito</strong></big></span>

                                <?php if (!isset($distrito)) { ?>
                                    <select id="distrito" name="distrito" style="width: 100%;"class="ui-corner-all text ui-widget-content">
                                         <option value="">...</option>
                                    </select>  
                                <?php
                                } else {
                                    echo $distrito;
                                }
                                ?>  
                        
                        </div>

                        </div>



                        <button type="button" id="añadir" class="btn btn-success glyphicon glyphicon-plus-sign" >AÑADIR</button>
                        <a href="index.php?controller=evento_proyeccion_social" class="button">ATRAS</a>
                                  
                        </tr>
                        </div>
                    </table>
                </fieldset> 



            </div>

        </div>
    </form>
    






    <div id="evento_sub_eventos">
        <?php echo $sub_eventos;?>
    </div>

    <div id="pre_actividades">
        <?php echo $pre_actividades;?>
    </div>

<a href="index.php?controller=evento_proyeccion_social" class="btn btn-primary">GRABAR</a>    
<a href="index.php?controller=evento_proyeccion_social" class="btn btn-primary">ATRÁS</a> 



</div>