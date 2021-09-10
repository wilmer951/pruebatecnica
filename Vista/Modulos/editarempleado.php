<?php
include "menu.php";

?>
<div class="containerdos">


<form method="post" id="formeditempleado">
	
	<?php

	$editarempleado = new ControladorMVC();
	$editarempleado -> editarempleadoControlador();
	$editarempleado -> actualizarempleadoControlador();
	

	?>



				  <button type="submit" class="btn btn-primary mb-2">Actualizar empleado</button>
</form>



</div>