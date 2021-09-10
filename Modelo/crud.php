<?php
	require_once "Conexion.php";
	class Datos extends Conexion{

	

//REGISTRAR EMPLEADOS
#------------------------------------
public static function ingresarempleadoModelo($datosModelo, $tabla){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,email,sexo,area_id,boletin,descripcion) 
			VALUES (:nombreemple,:emailemple,:sexoemple,:areaemple,:boletinemple,:descriemple)");	

		
		$stmt->bindParam(":nombreemple",$datosModelo["nombreemple"], PDO::PARAM_STR);
		$stmt->bindParam(":emailemple",$datosModelo["emailemple"], PDO::PARAM_STR);
		$stmt->bindParam(":sexoemple",$datosModelo["sexoemple"], PDO::PARAM_STR);
		$stmt->bindParam(":areaemple",$datosModelo["areaemple"], PDO::PARAM_INT);
		$stmt->bindParam(":boletinemple",$datosModelo["boletinemple"], PDO::PARAM_INT);
		$stmt->bindParam(":descriemple",$datosModelo["descriemple"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


//CONSULTAR EMPLEADOS

#------------------------------------
public static function consultarempleadosModelo($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");	


		$stmt->bindParam(":nombreemple",$datosModelo["nombreemple"], PDO::PARAM_STR);


		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();

}


//EDITAR EMPLEADOS

#------------------------------------
public static function editarempleadoModelo($id,$tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id=:idempleado");	


		$stmt->bindParam(":idempleado",$id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch();

		$stmt->close();

}



//ELIMINAR EMPLEADO

#------------------------------------
public static function eliminarempleadoModelo($id,$tabla){


		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :idempleado");	

		$stmt->bindParam(":idempleado",$id, PDO::PARAM_INT);
		
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

}








//CONSULTAR AREAS

#------------------------------------
public static function consultarareasModelo($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");	


		
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();

}



//ACTUALIZAR EMPLEADOS
#------------------------------------
public static function actualizarempleadoModelo($datosModelo,$tabla){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
			nombre=:nombreemple,email=:emailemple,sexo=:sexoemple,area_id=:areaemple,boletin=:boletinemple,descripcion=:descriemple
			WHERE id=:idempleado");	



		$stmt->bindParam(":idempleado",$datosModelo["idempleado"], PDO::PARAM_INT);
		
		$stmt->bindParam(":nombreemple",$datosModelo["nombreemple"], PDO::PARAM_STR);
		$stmt->bindParam(":emailemple",$datosModelo["emailemple"], PDO::PARAM_STR);
		$stmt->bindParam(":sexoemple",$datosModelo["sexoemple"], PDO::PARAM_STR);
		$stmt->bindParam(":areaemple",$datosModelo["areaemple"], PDO::PARAM_INT);
		$stmt->bindParam(":boletinemple",$datosModelo["boletinemple"], PDO::PARAM_INT);
		$stmt->bindParam(":descriemple",$datosModelo["descriemple"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



}//FIN CLASE PRINCIPAL
