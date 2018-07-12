<!-- ><div class="row">
    <div class="col-md-4 col-offset-md-3" id="alerta">

    </div>
</div>
<div class="row">
    <div class="col-md-3 col-offset-md-3">
     <input type="hidden" id="ide" value="<?php echo $data['id']; ?>" >
        <input type="text" id="nombre" placeholder="Nombre" value="<?php echo $data['datos']['nombre']; ?>" >
        <input type="text" id="marca" placeholder="marca" value="<?php echo $data['datos']['marca']; ?>" >
        <input type="text" id="correo" placeholder="correo" value="<?php echo $data['datos']['correo']; ?>" >
        <input type="text" id="telefono" placeholder="telefono" value="<?php echo $data['datos']['telefono']; ?>" > <button id="actualizar">Actualizar</button>
     
    </div><div class="col-md-4 col-offset-md-3" ></div> 
</div><-->

<div class="clear"></div>
                <div class="hr-invisible"></div>
                <div class="container">
                    <div class="column dt-sc-one-third first">
                        <h3 class="border-title">Send us a <span>Message</span></h3>
                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.</p>
                    </div>
                    <div class="column dt-sc-two-third">
                    	<h3 class="border-title"> <span>proveedores</span></h3>
                    	<form class="contact-form" method="post" name="enqform" action="php/send.php">
                            <div class="column dt-sc-one-half first">
                            	<div class="animate" data-delay="100" data-animation="fadeIn">
                                    <p> <input type="hidden" id="ide" value="<?php echo $data['id']; ?>" >
                                    <input type="text" id="nombre" placeholder="Nombre" value="<?php echo $data['datos']['nombre']; ?>" >
                                    <input type="text" id="marca" placeholder="marca" value="<?php echo $data['datos']['marca']; ?>" >
                                    <input type="text" id="correo" placeholder="correo" value="<?php echo $data['datos']['correo']; ?>" >
                                     <input type="text" id="telefono" placeholder="telefono" value="<?php echo $data['datos']['telefono']; ?>" > 
                                    </p>
                                                                                          
                                </div>
                            </div>
                            <div class="column dt-sc-one-half">
                            	<div class="animate" data-delay="300" data-animation="fadeIn">
                                    <p></p>
                                    <p></p>
                                </div>
                            </div>
                            <div class="column dt-sc-one-column">
                            	<div class="animate" data-delay="500" data-animation="fadeIn">
                                	<p></p>
                                </div>
                            </div>                                                                                             
                            <div class="form-row aligncenter animate" data-delay="700" data-animation="fadeIn">
                            <button id="actualizar">Actualizar</button>
                            </div>
                        </form>
                    	<div id="ajax_contactform_msg"> </div>
                    </div>
                </div>
