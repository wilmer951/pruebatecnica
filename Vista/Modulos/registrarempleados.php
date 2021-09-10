
<?php
include "menu.php";
?>

<div class="containerdos">



	<div class="alert alert-primary" role="alert">
  		Los campos marcados con * son obligatorios
	</div>

<div class="form1">
		<form id="formregistrempleado" method="post">
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Nombre completo *</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control-plaintext" name="nombreempleado" required>
				    </div>
				  </div>

				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Correo electronico *</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control-plaintext" name="emailempleado" required>
				    </div>
				  </div>

  		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Sexo *</label>
				<div class="col-sm-10">
				 <fieldset>
				        <label>
				            <input type="radio" name="sexoempleado" value="M" required>Masculino
				        </label>
				        <label>
				            <input type="radio" name="sexoempleado" value="F" required>Femenino
				        </label>
				 
				  </fieldset>

				</div>
	  </div>


		 <div class="form-group row">
				<label class="col-sm-2 col-form-label" required>Área *</label>
				<div class="col-sm-10">
						 <select class="form-select" name="areaempleado" required>
							  <option  value="" selected>Seleccione una opción</option>
							<?php   
							         $consultarareas = new ControladorMVC();
							         $consultarareas -> consultarareasControlador();
							   ?>
						</select>
				</div>
		</div>


		<div class="form-group row">

			<label class="col-sm-2 col-form-label" required>Descripción *</label>
				<div class="col-sm-10">
					<textarea class="form-control"  name="descripcionempleado" rows="3"></textarea>
				</div>
		</div>



	<div class="form-group row">
		<div class="col-sm-10">
	  		<input class="form-check-input" name="boletinempleado" type="checkbox" value="1" id="flexCheckIndeterminate">
	  		<label> Deseo recibir boletin informativo
	  		</label>
	  </div>
	</div>



				  <button type="submit" class="btn btn-primary mb-2">Registrar empleado</button>
		</form>
</div>



 <?php 

if(isset($_GET["st"])){
	
		if ($_GET["st"]=="ok") {
	echo '

			<div class="alert alert-success" role="alert">
				Registro exitoso
			</div>';

}else{

	echo '

		<div class="alert alert-danger" role="alert">
			Error al registrar datos.
		</div>

';


	}
}

?>

</div>




	<?php   
         $registrarempleado = new ControladorMVC();
         $registrarempleado -> ingresarempleadocontrolador();
   ?>


