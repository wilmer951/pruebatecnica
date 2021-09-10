<?php
include "menu.php";

?>
<div class="containerdos">



 <?php 

if(isset($_GET["st"])){
	
		if ($_GET["st"]=="ok") {
	echo '

			<div class="alert alert-success" role="alert">
				Operación exitosa.
			</div>';

}else{

	echo '

		<div class="alert alert-danger" role="alert">
			Operación fallida.
		</div>

';


	}
}

?>





<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Sexo</th>
      <th scope="col">Area</th>
      <th scope="col">Boletin</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
   <?php   
                
                  $consultaempleados = new ControladorMVC();
                  $consultaempleados -> consultarempleadosControlador();
            ?>

   
  </tbody>
</table>



</div>





<?php   
         $eliminarempleado = new ControladorMVC();
         $eliminarempleado -> eliminarempleadoControlador();
   ?>

