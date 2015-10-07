<style>
	#animacion_logo{
		width:300px;
		height:auto;
		margin-top:100px;
		opacity:0.99;
		animation-duration:3s;
		animation-name:giro;
		animation-iteration-count:infinite;    

		-moz-animation-duration:3s;
		-moz-animation-name: giro;
		-moz-animation-iteration-count:infinite;   

		-webkit-animation-duration:3s;
		-webkit-animation-name: giro; 
		-webkit-animation-iteration-count:infinite;
	}


	@keyframes giro{
		25%{transform:rotateY(90deg);}
		50%{transform:rotateY(180deg);}
		75%{transform:rotateY(270deg);}
		100%{transform:rotateY(360deg);}
	}

	@-moz-keyframes giro{
		25%{-moz-transform:rotateY(90deg);}
		50%{-moz-transform:rotateY(180deg);}
		75%{-moz-transform:rotateY(270deg);}
		100%{-moz-transform:rotateY(360deg);}
	}

	@-webkit-keyframes giro{
		25%{-webkit-transform:rotateY(90deg);}
		50%{-webkit-transform:rotateY(180deg);}
		75%{-webkit-transform:rotateY(270deg);}
		100%{-webkit-transform:rotateY(360deg);}
	}

	.form-control{
		border-radius: 0px !important; 
	}

	.contenido_panel:not(#panel_por_defecto){
		background: rgba(241,241,241,1);
		width: 100%;
		min-height:550px;
		overflow-y:scroll;
		padding: 16px;
	}

	input,select{
		border-radius:0px;
	}

	.ui-dialog-titlebar,.ui-widget-header{
		background:#1ABC9C;
		color: white;
		border-radius:0px;
		padding: 5px;
		box-shadow: 5px 7px 7px #888888;
	}
	.ui-dialog-content,.ui-widget-content{
		background:linear-gradient(#ffffff,#dde9f4);
	}
</style>
<body>
	<!--Header-->
	<div class="header" style="background:#1ABC9C;">
		<div class="container ">
			<div class="row">
				<div class="col-xs-1">
					<div class="fondologo">
						<img src="<?=$this->config->base_url();?>fronted_inicio/foto/logo1.png"  width="60" height="60">
					</div>
				</div>

				<div class="col-xs-7 col-xs-offset-1 titulo">
					<h1>Dr. Julio Reyes <small style="color:#CCC;font-size:0.5em;"> Administrador de Contendios</small></h1>
				</div>

				<div class="col-xs-3">
					<div style="padding:7px;">			
						<p style="color:white;margin-top:16px;font-size:1.3em;display:inline-block;">
							<?php echo strtoupper($usuario)." "; ?>
						</p>
						<div style="display:inline-block;background:#f1f1f1;width:43px;border-radius:50%;"><img src="<?=$this->config->base_url();?>fronted/img/iconos2/user.png" class="img img-circle" style="width:43px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Header-->


	<div class="container">
		<div class="col-xs-12">
			<?php /*****Panels********************/ ?>
			<div id="panel_por_defecto" class="contenido_panel" style="width:100%;background:transparent;height:600px;">
				<?php /* ?><img id="animacion_logo" src="<?=$this->config->base_url();?>fronted/img/medicina_logo.png"><?php */?>
				<div style="width:200px;margin:auto;">
					<img id="animacion_logo" src="<?=$this->config->base_url();?>fronted_inicio/foto/logo1.png">
				</div>
			</div>

			<div id="panel_galeria" class="contenido_panel" style="display:none;width:100%;height:600px;">
				<p style="font-size:1.4em;"> Galeria <button class="btn btn-primary" style="float:right;" id="nueva_galeria"><span class="glyphicon glyphicon-plus"> Nuevo</span>	</button></p>
				<hr>

				<?php 
				if($galeria->result() != null){

					foreach ($galeria->result() as $foto) {
						?>
						<a class="boxer" href="<?=$this->config->base_url()?>fronted/img/cirujano/galeria/<?=$foto->nombre_img;?>" class="boxer" title="Galeria" >
							<img  src="<?=$this->config->base_url()?>fronted/img/cirujano/galeria/<?=$foto->nombre_img;?>" style="width:125px;cursor:pointer;">
						</a>
						<?php	
					}

				}
				?>
				<div id="mas_imagenes_galeria" style="display:none;">
					<div class="botones_archivos" style="overflow:hidden;margin-bottom:25px;">
						<p style="font-size:1.2em;">Añadir mas archivos a la galeria
							<button id="menos_file" class="btn btn-danger"  style="float:right;"><span class="glyphicon glyphicon-minus" style="font-size:0.8em;"></span></button>
							<button id="mas_file" class="btn btn-primary"  style="float:right;"><span class="glyphicon glyphicon-plus" style="font-size:0.8em;"></span></button>
						</p>
					</div>

					<form action="<?=$this->config->base_url()?>index.php/Admin/insert_galeria" method="post" enctype="multipart/form-data">
						<div id="inpuflivos" style="height:auto;">
							<input type="file" name="archivosgaleria[]" class="archivosgaleria form-control" style="border-radius:0px;display:inline;margin-right:10px;height:auto;">
						</div>
						<hr>
						<button type="submit" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar</button>
					</form>
				</div>

			</div>


			<div id="panel_curriculum" class="contenido_panel" style="display:none;">
				<p style="font-size:1.4em;"> Curriculum , para mayor comodidad presione el boton de pantalla completa <span class="glyphicon glyphicon-fullscreen"></span></p>
				<hr/>
				<form action="<?=$this->config->base_url()?>index.php/Admin/editar_curriculum" method="post">

					<textarea id="text_curriculum" name="text_curriculum">
						<?php
						foreach ( $curriculum->result() as $perfil ) {
							echo $perfil->curriculum_completo;	
						}
						?>
					</textarea>
					<hr>
					<button type="submit" class="btn btn-success" style="float:right;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
					<div style="clear:both;"></div>
				</form>
			</div>

			<div id="panel_contacto" class="contenido_panel" style="display:none;">
				<p style="font-size:1.4em;"> Contacto </p>
				<hr>
				<table class="table table-hover" id="tabla_contacto">
					<thead>					
						<tr>
							<th>Nombres</th>
							<th>Servivio</th>
							<th>Email</th>
							<th>Celular</th>
							<th>Asunto</th>
							<th>Ver</th>
							<th>Eliminar</th>
						</tr>
					</thead>

					<?php foreach ($contactos->result() as $contacto) : ?>

						<tr>
							<td><?php echo $contacto->nombres_contacto; ?></td>
							<td><?php echo $contacto->servicio; ?></td>
							<td><?php echo $contacto->email_contacto; ?></td>
							<td><?php echo $contacto->telefono_movil_contacto; ?></td>
							<td><?php echo $contacto->asunto_contacto; ?></td>
							<td><button class="btn btn-primary ver_contacto" data-nombres="<?=$contacto->nombres_contacto;?>" data-apellidos="<?=$contacto->servicio;?>" data-email="<?=$contacto->email_contacto;?>"  data-telefono="<?=$contacto->telefono_movil_contacto;?>" data-asunto="<?=$contacto->asunto_contacto;?>" data-detalle="<?=$contacto->descripcion_contacto;?>" ><span class="glyphicon glyphicon-eye-open"></span></button></td>
							<td><button class="btn btn-danger del_contacto" data-id="<?=$contacto->id_contacto;?>"><span class="glyphicon glyphicon-remove"></span></button></td>
						</tr>

					<?php endforeach; ?>

					<tfoot style="display:none;">
						<tr>
							<th>Nombres</th>
							<th>Servicio</th>
							<th>Email</th>
							<th>Celular</th>
							<th>Asunto</th>
							<th>Ver</th>
							<th>Eliminar</th>
						</tr>
					</tfoot>
				</table>
			</div>

			<div id="panel_procedimientos" class="contenido_panel" style="display:none;">
				<p style="font-size:1.4em;"> Procedimientos <button class="btn btn-primary" style="float:right;" id="nuevo_procedimiento"><span class="glyphicon glyphicon-plus"> Nuevo</span>	</button></p>

				<div id="new_procedimiento" style="display:none;">
					<form action="" method="post" enctype="multipart/form-data">
						<p>Nombre procedimiento:</p>
						<input type="text" id="nombre_procedure" name="nombre_procedure" class="form-control">
						<p>Subtitulo procedimiento:</p>
						<input type="text" id="subtitulo_procedure" name="subtitulo_procedure" class="form-control">
						<p>Detalle procedimiento:</p>
						<textarea id="detalle_procedure" name="detalle_procedure" class="form-control">
							
						</textarea>
						<p>Imagen procedimiento:</p>
						<input type="file" class="form-control" style="height:auto;">

						<hr>
						<button type="submit" class="btn btn-success" style="float:right;">
							<span class="glyphicon glyphicon-floppy-disk"></span> Guardar
						</button>
					</form>
				</div>

				<hr>
				<table class="table table-hover" id="tabla_procedimientos">
					<thead>					
						<tr>
							<th>Nombre</th>
							<th>Detalle</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>

					<?php foreach ($procedimientos->result() as $proc) : ?>

						<tr>
							<td><?php echo $proc->titulo; ?></td>
							<td><?php echo $proc->detalle; ?></td>
							<td><button class="btn btn-primary edit-proc" data-id="<?=$proc->id_procedimiento;?>" data-titulo="<?=$proc->titulo;?>" data-subtitulo="<?=$proc->sub_titulo;?>" data-detalle="<?=$proc->detalle;?>" data-imgprincipal="<?=$proc->img_principal_procedimiento;?>"><span class="glyphicon glyphicon-eye-open"></span></button></td>
							<td><button class="btn btn-danger del-proc" data-id="<?=$proc->id_procedimiento; ?>"><span class="glyphicon glyphicon-remove"></span></button></td>
						</tr>

					<?php endforeach; ?>

					<tfoot style="display:none;">
						<tr>
							<td>Nombre</td>
							<td>Detalle</td>
							<td>Editar</td>
							<td>Eliminar</td>
						</tr>
					</tfoot>
				</table>

			</div>

			<div id="panel_testimonios" class="contenido_panel" style="display:none;">
				<p style="font-size:1.4em;"> Testimonios </p>
				<table class="table table-hover" id="tabla_testimonios">
					<thead>					
						<tr>
							<th>Nombres</th>
							<th>Email</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>

					<?php foreach ($testimonios->result() as $test) : ?>

						<tr>
							<td><?php echo $test->nombres_del_descriptor; ?></td>
							<td><?php echo $test->email_del_descriptor; ?></td>
							<td><button class="btn btn-primary edit-test" data-id="<?=$test->id_testimonio;?>" ><span class="glyphicon glyphicon-eye-open"></span></button></td>
							<td><button class="btn btn-danger del-test" data-id="<?=$test->id_testimonio; ?>"><span class="glyphicon glyphicon-remove"></span></button></td>
						</tr>

					<?php endforeach; ?>

					<tfoot style="display:none;">
						<tr>
							<td>Nombre</td>
							<td>Detalle</td>
							<td>Editar</td>
							<td>Eliminar</td>
						</tr>
					</tfoot>
				</table>
			</div>

			<?php /*****Panels********************/ ?>
		</div>
	</div>

	<?php /********************************************************************************/ ?>
	<div id="ventana_edit_procedimientos" style="display:none;padding:16px;">
		<form action="<?=$this->config->base_url()?>index.php/Admin/editar_proc" method="post">
			<input type="hidden" id="id_procedimiento" name="id_procedimiento">
			<p>Nombre Procedimiento:</p>
			<input type="text" class="form-control" id="nombre_procedimiento" name="nombre_procedimiento">
			<p>Subtitulo Procedimiento:</p>
			<input type="text" class="form-control" id="subtitulo_procedimiento" name="subtitulo_procedimiento">
			<p>Descripción Procedimiento:</p>
			<textarea class="form-control" id="detalle_procedimiento" name="detalle_procedimiento" style="resizable:none;overflow-y:scroll;height:200px;">

			</textarea>
			<hr>
			<button type="submit" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
		</form>
	</div>

	<div id="ventana_ver_contacto" style="display:none;">
		<div style="width:100%;margin:auto;padding:1em;">
			<table class="table table-hover">
				<tr>
					<th>Nombres</th>
					<td id="mostrar_nombre_contacto"> </td>
				</tr>

				<tr>
					<th>
						Servicios
					</th>	

					<td id="mostrar_apellido_contacto">

					</td>					
				</tr>

				<tr>
					<th>
						Celular
					</th>	

					<td id="mostrar_telefono_contacto">

					</td>					
				</tr>

				<tr>
					<th>
						Email
					</th>	

					<td id="mostrar_email_contacto">

					</td>					
				</tr>

				<tr>
					<th>
						Asunto
					</th>	

					<td id="mostrar_asunto_contacto">

					</td>					
				</tr>

				<tr class="info">
					<th colspan="2" style="text-align:center;">
						Detalle
					</th>			
				</tr>

				<tr>
					<td colspan="2" >
						<p  id="mostrar_detalle_contacto" style="margin:auto;text-indent:16px;padding:7px;text-align:justify;width:700px;height:200px;overflow-y:scroll;word-wrap: break-word; ">
							
						</p>
					</td>	
				</tr>

			</table>
		</div>
	</div>

	<div id="ventana_eliminar_contacto" style="display:none;">

		<form action="<?=$this->config->base_url()?>index.php/Admin/eliminar_contacto" method="post">
			<input type="hidden" id="id_eliminar_contacto" name="id_eliminar_contacto">

			<div style="margin:auto;padding:16px;width:115px;">
				<button class="btn btn-danger" id="boton_eliminar_contacto">Aceptar</button>
			</div>

		</form>

	</div>

	<div id="ventana_eliminar_procedimiento" style="display:none;">
		
		<form action="<?=$this->config->base_url()?>index.php/Admin/eliminar_procedimiento" method="post">
			<input type="hidden" id="id_eliminar_procedimiento" name="id_eliminar_procedimiento">

			<div style="margin:auto;padding:16px;width:115px;">
				<button class="btn btn-danger" id="boton_eliminar_procedimiento">Aceptar</button>
			</div>

		</form>

	</div>	
	<?php /********************************************************************************/ ?>

</body>

<script>
// espera hasta que el DOM este cargado
jQuery(document).ready(function () {
     // esconder el body para luego mostrarlo
     $('body').hide();

 });
// espera hasta que todo el contenido este descargado
jQuery(window).load(function(){
     // mostrar la etiqueta body lentamente
     $('body').fadeIn(1500);
 });

$(document).on("ready",function(){

	$("#tabla_procedimientos,#tabla_contacto,#tabla_testimonios").dataTable();

	CKEDITOR.replace( 'text_curriculum' );

	$(".ver_contacto").on("click",function(){
		
		$("#mostrar_nombre_contacto").html( $(this).data("nombres") );
		$("#mostrar_apellido_contacto").html( $(this).data("apellidos") );
		$("#mostrar_telefono_contacto").html( $(this).data("telefono") );
		$("#mostrar_email_contacto").html( $(this).data("email") );
		$("#mostrar_asunto_contacto").html( $(this).data("asunto") );
		$("#mostrar_detalle_contacto").html( $(this).data("detalle") );
	$("#ventana_ver_contacto").dialog({width:"800px",title:"Detalle del Contacto",modal:true,minHeight:"300px","resizable":false/*,position: "top"*/});
});


	$("#nueva_galeria").on("click",function(){
	$("#mas_imagenes_galeria").dialog({minWidth:"600px",width:"600px",title:"Detalle Procedimiento",modal:true,minHeight:"300px","resizable":false/*,position: "top"*/});
});
	

	$("#nuevo_procedimiento").on("click",function(){
	$("#new_procedimiento").dialog({width:"800px",title:"Guardar nuevo Procedimiento",modal:true,minHeight:"300px","resizable":false/*,position: "top"*/});
});
	
	$(".edit-proc").on("click",function(){

		$("#id_procedimiento").val( $(this).data("id") );
		$("#nombre_procedimiento").val( $(this).data("titulo") );
		$("#subtitulo_procedimiento").val( $(this).data("subtitulo") );
		$("#detalle_procedimiento").val( $(this).data("detalle") );

		//$("#detalle_procedimiento").after("<img src='<?=$this->config->base_url()?>fronted/img/cirujano/'>");
	$("#ventana_edit_procedimientos").dialog({minWidth:"600px",width:"600px",title:"Detalle Procedimiento",modal:true,minHeight:"300px","resizable":false/*,position: "top"*/});
});



	$(".del_contacto").on("click",function(){

		$("#id_eliminar_contacto").val( $(this).data("id") );

	$("#ventana_eliminar_contacto").dialog({width:"400px",title:"¿ Estas seguro de eliminar este contacto ?",modal:true,minHeight:"300px","resizable":false/*,position: "top"*/});

});

	$(".del-proc").on("click",function(){

		$("#id_eliminar_procedimiento").val( $(this).data("id") );

	$("#ventana_eliminar_procedimiento").dialog({width:"450px",title:"¿ Estas seguro de eliminar este Procedimiento ?",modal:true,minHeight:"300px","resizable":false/*,position: "top"*/});
});


	

	/**********************************************************************************************/
	$(".item_panel_control").on("click",function(){

		$(".contenido_panel").each(function(index, el) {

			if( $(this).hasClass('panel_invisible') ){

				$(this).slideUp();

			}

		});

		var panel = "#"+$(this).data("panel");

		$(panel).slideDown('slow',function(){
			$(".contenido_panel").addClass('panel_invisible');
			$(this).removeClass('panel_invisible');
			$(this).addClass('panel_visible');		

			$(".contenido_panel").each(function(index, el) {

				if( $(this).hasClass('panel_invisible') ){

					$(this).slideUp();

				}

			});

		});


	});


	$("#mas_file").on("click",function(e){
		e.preventDefault();

		if($(".archivosgaleria").length < 7 ){agregar();}   
	});



	$("#menos_file").on("click",function(e){
		e.preventDefault();
		if($(".archivosgaleria").length > 1){ 
			$(".archivosgaleria:last").css("background","red").remove(); 
		}
	});

	$(".boxer").boxer({
		fixed: true
	});
	/******************************Fin ready******************************/	
});

function agregar(){
	var file='<input type="file" name="archivosgaleria[]" class="archivosgaleria form-control" style="border-radius:0px;display:inline;margin-right:10px;height:auto;">';
	var nuevo_file = $(file);
	$("#inpuflivos").append(nuevo_file);
}
</script>