<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipo_evento.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<link href="css/formproyecto.css" rel="stylesheet" type="text/css" />
<div class="div_container">
<h6 class="ui-widget-header">Registro de Tipo Evento</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipo_evento" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>  
                 <div class="div_container">
                        <div class="tab-content col-md-12" style="height: auto;background-color: #FFFFFF; margin-bottom: 15px;font-family: Calibri;text-align: left;padding-left: 0; padding-right: 0; border-bottom:1px solid #ddd ; border-left: 1px solid #ddd;border-right:1px solid #ddd; border-bottom-left-radius: 4px;  border-bottom-right-radius: 4px;">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <span class="input-group-addon"><strong for="idtipo_evento" >Codigo</strong></span>
                                    <input type="text" class="form-control oblig" placeholder="Codigo" name="idtipo_evento" id="idtipo_evento" value="<?php echo $obj->idtipo_evento; ?>" readonly>
                                </div>                                
                            </div>
<!--                <label for="idtipo_evento" class="labels" style="width: 45px">Codigo:</label>
                <input id="idtipo_evento" name="idtipo_evento" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->idtipo_evento; ?>" readonly />                -->
                <br>
                <div class="col-md-12">
                                <div class="col-md-12">
                                    <span class="input-group-addon"><strong for="descripcion" >descripcion</strong></span>
                                    <input type="text" class="form-control oblig" placeholder="descripcion" name="descripcion" id="descripcion" value="<?php echo $obj->descripcion; ?>">
                                </div>
<!--                <label for="descripcion" class="labels" style="width: 95px" >Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />-->
                <br/>
                <br/>
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
                 <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tipo_evento" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>