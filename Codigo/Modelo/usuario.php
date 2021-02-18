<?php
require_once("conexion.php");
Class Usuario
{
	public function ObtenerTodos()
	{	$conexion=new Conexion;
		$usuarios=$conexion->consultar('usuarios');
		return $usuarios;
	}
	public function nuevo($datos)
	{	$conexion=new Conexion;
		$usuarios=$conexion->insertar('usuarios',$datos);
		return $usuarios;
	}

	public function nuevo_ticket($datos)
	{	$conexion=new Conexion;
		$ticket=$conexion->insertar_ticket('ticket',$datos);
		return $ticket;
	}
}
?>