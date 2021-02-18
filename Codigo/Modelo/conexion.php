<?php
Class conexion
{	private $usuario="root";
	private $pass="";
	private $dbcon=null;
	private $dns="mysql:host=localhost:3307;dbname=terminalapp";
	private $error=null;
	
	private function conectar()
	{
		try {
			$this->dbconn = new PDO($this->dns, $this->usuario, 
			$this->pass);
			$this->dbconn->setAttribute(PDO::ATTR_ERRMODE, 
								PDO::ERRMODE_EXCEPTION);
			return true;
			} catch (PDOException $e) {
			$this->error= $e->getMessage();
			return false;
		}
	}
		
	public function consultar($tabla)
	{	try {
		if(!$this->conectar())
		{	return "No conecta".$this->error;
			exit;
		}
		$query="Select * from $tabla";
		$result_set = $this->dbconn->prepare($query);
		$result_set->execute();
		$result = $result_set->fetchAll();
		return $result;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
	public function insertar($tabla,$datos)
	{	
		try {
			$this->conectar();
			$sql = "INSERT INTO $tabla(";
			foreach($datos as $clave=>$valor)
			{
				$sql .=$clave.",";
			}
			$sql = substr ($sql, 0, strlen($sql) - 1).") VALUES(";
			foreach($datos as $clave=>$valor)
			{
				$sql .=":".$clave.",";
			}
			$sql = substr ($sql, 0, strlen($sql) - 1).")";
			$stmt = $this->dbconn->prepare($sql);
			foreach($datos as $clave=>$valor)
			{$clave=':'.$clave;
			 $stmt->bindValue($clave, $valor);
			}
			// execute the insert statement
			$stmt->execute();
			return "Datos insertados...";
		} catch (Exception $e) {
			$this->error= $e->getMessage();
			return "Error al insertar... ".$this->error;
		}
	}
	public function insertar_ticket($tabla,$datos)
	{	
		try {
			$this->conectar();
			$sql = "INSERT INTO $tabla(";
			foreach($datos as $clave=>$valor)
			{
				$sql .=$clave.",";
			}
			$sql = substr ($sql, 0, strlen($sql) - 1).") VALUES(";
			foreach($datos as $clave=>$valor)
			{
				$sql .=":".$clave.",";
			}
			$sql = substr ($sql, 0, strlen($sql) - 1).")";
			$stmt = $this->dbconn->prepare($sql);
			foreach($datos as $clave=>$valor)
			{$clave=':'.$clave;
			 $stmt->bindValue($clave, $valor);
			}
			// execute the insert statement
			$stmt->execute();
			return "Ticket insertados...";
		} catch (Exception $e) {
			$this->error= $e->getMessage();
			return "Error al insertar el ticket... ".$this->error;
		}
	}
}
?>