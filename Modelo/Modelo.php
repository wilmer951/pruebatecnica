<?php


//******************** FUNCION ENLACES ************************

		
class ModulosMVC
	{



		public static function enlacesModelos($enlaces)

			{


				if(
						$enlaces=="home" ||
						$enlaces=="registrarempleados"||
						$enlaces=="consultarempleados"||
						$enlaces=="editarempleado"
						
						
						
					

							)

				     {


				     	  $enlaces="Vista/Modulos/".$enlaces.".php";

				     }else {


				     		$enlaces="Vista/Modulos/home.php";

				     		}


				     	return $enlaces;




			}







	}



?>

