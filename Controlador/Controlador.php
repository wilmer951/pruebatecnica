<?php //************* METODO REDIRECCION A PLANTILLA **************
	
	class ControladorMVC  {


	public  function plantilla()
		{
			include "Vista/plantilla.php";
		}


//********************* METODO ENLACES  *******************************	

	public function enlacesControlador(){

		if(isset($_GET["ir"]))
		{

			$enlacesControlador = $_GET["ir"];

		}

		else{

			$enlacesControlador = "index";
			
		}

		$respuesta = ModulosMVC::enlacesModelos($enlacesControlador);

		include $respuesta;

	}




#INGRESAR EMPLEADO
	#------------------------------------
	public  function ingresarempleadocontrolador(){

		if(isset($_POST["nombreempleado"])){



	#preg_match = Realiza una comparación con una expresión regular del lado servidor
		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nombreempleado"])){


				
				if ($_POST["boletinempleado"]==1) {
					$boletin=1;
					
				}else{

					$boletin=0;
				}



			$datosController = array( "nombreemple"=>$_POST["nombreempleado"],
									  "emailemple"=>$_POST["emailempleado"],
									  "sexoemple"=>$_POST["sexoempleado"],
									  "areaemple"=>$_POST["areaempleado"],
									  "boletinemple"=>$boletin,
									  "descriemple"=>$_POST["descripcionempleado"]
										);


				$respuesta = Datos::ingresarempleadoModelo($datosController, "empleados");

				if($respuesta == "success")
						{
							
							header("location:index.php?ir=registrarempleados&st=ok");

						}

							else{

							header("location:index.php?ir=registrarempleados&st=fail");
							
							}

			

			}else{

				header("location:index.php?ir=registrarempleados&st=fail");
			}		

				
		}//cierre isset principal


}//cierre metodo registrar empleados



//CONSULTAR EMPLEADOS
#------------------------------------
public function consultarempleadosControlador(){

	
		$respuesta = Datos::consultarempleadosModelo("empleados");

			foreach ($respuesta as $row => $item) {
			

			echo'

  	<tr>
      <th scope="row">1</th>
      <td>'.$item["nombre"].'</td>
      <td>'.$item["email"].'</td>
      <td>'.$item["sexo"].'</td>
      <td>'.$item["area_id"].'</td>
      <td>'.$item["boletin"].'</td>

      
      <td><a href="index.php?ir=editarempleado&id='.$item["id"].'"><i class="fas fa-edit"></i></a></td>
      <td><a href="index.php?ir=consultarempleados&idborrar='.$item["id"].'"<i class="fas fa-trash-alt"></i></a></td>
    </tr>

			 ';


	}
}




#EDITAR EMPLEADO
	#------------------------------------
	public  function editarempleadoControlador(){

		if(isset($_GET["id"])){


		$datosController = $_GET["id"];

			$respuesta = Datos::editarempleadoModelo($datosController, "empleados");
			$respuesta2 = Datos::consultarareasModelo("areas");

			echo '
			<input type="hidden" name="idempleadoedit" value="'.$respuesta["id"].'">

			 <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Nombre completo *</label>
				    <div class="col-sm-10">
				    <input type="text" class="form-control-plaintext" value="'.$respuesta["nombre"].'" name="nombreempleadoedit" required>
				    </div>
				  </div>



		<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Correo electronico *</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control-plaintext" name="emailempleadoedit" value="'.$respuesta["email"].'" required>
				    </div>
				  </div>

  		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Sexo *</label>
				<div class="col-sm-10">
				 <fieldset>
				        <label>
				            <input type="radio" name="sexoempleadoedit" value="M" required>Masculino
				        </label>
				        <label>
				            <input type="radio" name="sexoempleadoedit" value="F" required>Femenino
				        </label>
				 
				  </fieldset>

				</div>
	  		</div>



	  		<div class="form-group row">
				<label class="col-sm-2 col-form-label" required>Área *</label>
				<div class="col-sm-10">
						 <select class="form-select" name="areaempleadoedit">
						  <option  value="" selected>Seleccione una opción</option>
							  ';
					foreach ($respuesta2 as $row => $item) {
				echo'

			  					<option value="'.$item["id"].'">'.$item["nombre"].'</option>

						 ';


					}


		echo'
							
						</select>
				</div>
		</div>


	<div class="form-group row">

			<label class="col-sm-2 col-form-label" required>Descripción *</label>
				<div class="col-sm-10">
					<textarea class="form-control"  name="descripcionempleadoedit" rows="3"></textarea>
				</div>
		</div>




			<div class="form-group row">
		<div class="col-sm-10">
	  		<input class="form-check-input" name="boletinempleadoedit" type="checkbox" value="1" id="flexCheckIndeterminate">
	  		<label> Deseo recibir boletin informativo
	  		</label>
	  </div>
	</div>

			';




 }


}





//CONSULTAR AREAS
#------------------------------------
public function consultarareasControlador(){

	
		$respuesta = Datos::consultarareasModelo("areas");

			foreach ($respuesta as $row => $item) {
			

			echo'

  <option value="'.$item["id"].'">'.$item["nombre"].'</option>

			 ';


	}
}



//ELIMNACION DE EMPLEADO
#------------------------------------
public function eliminarempleadoControlador(){

	
	if(isset($_GET["idborrar"])){

	$datosController = $_GET["idborrar"];

			$respuesta = Datos::eliminarempleadoModelo($datosController, "empleados");

			if($respuesta == "success")
						{
							
							header("location:index.php?ir=consultarempleados&st=ok");

						}

							else{

							header("location:index.php?ir=consultarempleados&st=fail");
							
							}

		 }

}







#ACTUALIZAR EMPLEADO
	#------------------------------------
	public  function actualizarempleadoControlador(){

		if(isset($_POST["nombreempleadoedit"])){

				
				if ($_POST["boletinempleadoedit"]==1) {
					$boletin=1;
					
				}else{

					$boletin=0;
				}



			$datosController = array( "idempleado"=>$_POST["idempleadoedit"], 
									"nombreemple"=>$_POST["nombreempleadoedit"],
									  "emailemple"=>$_POST["emailempleadoedit"],
									  "sexoemple"=>$_POST["sexoempleadoedit"],
									  "areaemple"=>$_POST["areaempleadoedit"],
									  "boletinemple"=>$boletin,
									  "descriemple"=>$_POST["descripcionempleadoedit"]
										);


				$respuesta = Datos::actualizarempleadoModelo($datosController, "empleados");

				if($respuesta == "success")
						{
							
							header("location:index.php?ir=consultarempleados&st=ok");

						}

							else{

							header("location:index.php?ir=consultarempleados&st=fail");
							
							}

			

					

				
		}//cierre isset principal


}//cierre metodo registrar empleados


















}//FIN CLASE PRINCIPAL