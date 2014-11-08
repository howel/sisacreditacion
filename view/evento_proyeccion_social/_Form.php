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
         border: black 1px solid; 
    padding: 15px 20px;
    
         }
       
       
        h2 {
    
       
    color: #242424;
    font-size: 28px;
    padding: 5px 5px;
    text-shadow: 0 0 0.2em #999999;
}

         h2 span[class*="fontawesome-"] {
    margin-right: 14px;
}
       
        div {
   margin: .3em 0;
}
label {
   width: 20%;
   float: left;
   text-align: left;
  
	
    
   
}

      
</style>



    <form id="frm" action="index.php" method="POST">
        <input type="hidden" name="controller" value="evento_proyeccion_social" />
        <input type="hidden" name="action" value="save" />
        <div class="contFrm ui-corner-all">
            <div class="transparente" class="contenido" style="margin:0 auto; width: 500px; ">
<!--               <fieldset style="border:6px groove #ccc; background-image:url(css/images_eapisi/fondo.gif) ;"  class="ui-corner-all" >-->
            
                      
                   <fieldset>
                   <table width="100"><legend><h2>Datos</h2></legend>
                        
                        <div  class="tab-content col-md-1" >
                          <tr>
                            <div class="col-md-12">
                               


                                <div class="col-md-6">
                                     <big><label for="idevento" >Codigo</label></big>
                                    <input type="text" class="form-control oblig" placeholder="Codigo" name="idevento" id="idevento" value="<?php echo $obj['idevento']; ?>" readonly>
                                </div> 








                                <div class="col-md-6">
                                    <big ><label for="tema" style="width: 161px;">Tema del evento</label></big>
                                    <input type="text" class="form-control oblig" placeholder="Tema" name="tema" id="tema" value="<?php echo $obj['tema']; ?>">
                                </div>
                            </div>
                       



                            <div class="col-md-12">
                                <div class="col-md-6">
                                   <big><label>Lugar</label></big>
                                    <input id="lugar" maxlength="100" name="lugar" class="text ui-widget-content ui-corner-all" placeholder="Lugar" style=" width: 185px; text-align: left;" value="<?php echo $obj['lugar']; ?>">
                                </div>
                              
                                



                                                    
                            <div class="col-md-6">
                       <big><label for="fecha" >Fecha</label></i></big>
                          
                           
                                        <input type="text" class="form-control oblig" placeholder="Fecha" name="fecha" id="fecha" value="<?php echo $obj['fecha']; ?>">
                                
                       
                                </div>
                            </div>  





                       <div class="col-md-12">
                                <div class="col-md-6">
                                     <big> <label for="tipo_evento" style="width: 161px;"> Tipo de Evento</label></big>

                                <?php echo $tipo_evento; ?>
                                </div>




                          
                            
                           


                            <div class="col-md-6">
                                <big><label>Departamento</label></big>
                                <?php echo $departamento; ?>
                           </div>



                          
                               </div>
                      









                          <div class="col-md-12">






                             <div class="col-md-6">
                              <big><label for="provincia" >Provincia</label></big>
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
                      <big><label>Distrito</label></big>

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