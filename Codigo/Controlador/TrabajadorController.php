<?php
require_once("../modelo/usuario.php");
$objUsuario=new Usuario;
switch($_POST['opcion'])
{
	case 'consultar':
		$datos=$objUsuario->ObtenerTodos();
		$tabla="";
		
		foreach($datos as $fila)
		{
			$tabla.="<tr>";
			$tabla.="<th scope='row'>".$fila['Id']."</th>";
			$tabla.="<td>".$fila['nombre']."</td>";
			$tabla.="<td>".$fila['apellido']."</td>";
			$tabla.="<td>".$fila['telefono']."</td>";
			$tabla.="<td>".$fila['correo']."</td>";
			$tabla.="<td>".$fila['cedula']."</td>";
			$tabla.="<td>".$fila['usuario']."</td>";
			$tabla.="<td>".$fila['password']."</td>";
			$tabla.="<td>".$fila['tipo']."</td>";
			$tabla.="<td><button type='button' class='btn btn-outline-dark' onclick='editar(".$fila['Id'].")'>Editar</button></td>";
			$tabla.="<tr>";
		}
		echo $tabla;
		break;
	case 'ingresar':
		$datos['nombre']=$_POST['nombre'];
		$datos['apellido']=$_POST['apellido'];
		$datos['telefono']=$_POST['telefono'];
		$datos['correo']=$_POST['correo'];
		$datos['cedula']=$_POST['cedula'];
		$datos['usuario']=$_POST['usuario'];
		$datos['password']=$_POST['password'];
			if($objUsuario->nuevo($datos))
			{
				echo "Registro ingresado";
			}
			else
			{
				echo "Error al registrar".$objUsuario->geterror();
			}
		break;
		case 'ingresar_ticket':
			$datos['name']=$_POST['name'];
			$datos['tiempo']=$_POST['tiempo'];
			$datos['cooperativa']=$_POST['cooperativa'];
			$datos['image']=$_POST['image'];
			$datos['price']=$_POST['price'];
		
				if($objUsuario->nuevo_ticket($datos))
				{
					echo "Ticket ingresado";
				}
				else
				{
					echo "Error al registrar Ticket".$objUsuario->geterror();
				}
			break;
}
?>