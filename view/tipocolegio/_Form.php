<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipocolegio.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<link href="css/formproyecto.css" rel="stylesheet" type="text/css" />

<div class="div_container">
<h6 class="ui-widget-header">Registro de Tipo Colegio</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipocolegio" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                 <div class="div_container">
                      <div class="tab-content col-md-12" style="height: auto;background-color: #FFFFFF; margin-bottom: 15px;font-family: Calibri;text-align: left;padding-left: 0; padding-right: 0; border-bottom:1px solid #ddd ; border-left: 1px solid #ddd;border-right:1px solid #ddd; border-bottom-left-radius: 4px;  border-bottom-right-radius: 4px;">
                  <div class="col-md-12">
                                <div class="col-md-12">
                                    <span class="input-group-addon"><strong for="CodigoTipoColegio" >Codigo</strong></span>
                                    <input type="text" class="form-control oblig" placeholder="Codigo" name="CodigoTipoColegio" id="CodigoTipoColegio" value="<?php echo $obj->CodigoTipoColegio; ?>" readonly>
                                </div>   
                      </div>
                          </div>
                      </div>
                    
                          
<!--                <label for="CodigoTipoColegio" class="labels" style="width:40px" >Codigo:</label>-->
<!--                <input id="CodigoTipoColegio" name="CodigoTipoColegio" class="text ui-widget-content ui-corner-all" style=" wid<th: 100px; text-align: left;" value="<?php echo $obj->CodigoTipoColegio; ?>" readonly />                -->
                
                <div class="col-md-12">
                                <div class="col-md-12">
                                    <span class="input-group-addon"><strong for="DescripcionTipoColegio" >descripcion</strong></span>
                                    <input type="text" class="form-control oblig" placeholder="descripcion" name="DescripcionTipoColegio" id="DescripcionTipoColegio" value="<?php echo $obj->DescripcionTipoColegio; ?>">

                                    <!--                <label for="DescripcionTipoColegio" class="labels" style="width: 160px" >Descripcion:</label>-->
<!--                <input id="DescripcionTipoColegio" maxlength="100" name="DescripcionTipoColegio" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->DescripcionTipoColegio; ?>" />-->
          </div>
                    </div>
             
            </fieldset> 
            <fieldset>
                <legend>Accion</legend>
            <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tipocolegio" class="button">ATRAS</a>
                </div>
                </fieldset>
        </div>
    </div>
        
</form>>
                 </div>
        
 

        