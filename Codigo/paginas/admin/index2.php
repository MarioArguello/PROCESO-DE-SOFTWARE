<?php
  session_start();

    require '../../php/database.php';

  if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {

      case "cliente":
          header('Location: ../cliente/index3.php');
        break;

        default:
    }
  }	

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM usuarios WHERE id_usuario = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>    
	<meta charset="utf-8">
	<title>Bodegas AVG</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body background="../../img/fondo.jpg" style="background-repeat: no-repeat; background-position: center center;">
	<section class="title">
		<h1>Bodegas AVG</h1>
	</section>
<nav class="navegacion">
		<ul class="menu">

			<li class="first-item">
				<a href="index2.php">
					<img src="../../img/home.jpg" alt="" class="imagen">
					<span class="text-item">Inicio</span>
					<span class="down-item"></span>
				</a>
			</li>

		<li>
				<a href="../../php/logout.php">
					<img src="../../img/us.jpg" alt="" class="imagen">
					<span class="text-item"><?php if(!empty($user)): ?>Bienvenido Admin. <?= $user['usuario']; ?>
						<?php endif; ?>
					</span>
					<span class="down-item"></a></span>
				</a>
			</li>

				<li>
				<a href="listado.php">
					<img src="../../img/blog.jpg" alt="" class="imagen">
					<span class="text-item">Listado de Usuarios</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="capacidad.php">
					<img src="../../img/servicios.jpg" alt="" class="imagen">
					<span class="text-item">Capacidad de Bodegas</span>
					<span class="down-item"></span>
				</a>
			</li>


		</ul>
	</nav>
		<section class="info">
		<h2 align="center"><br>Expertos en Cuidar tus productos</h2><br><br>
		<p align="center">Nuestra empresa se caracteriza por su excelente servicio y su confiabilidad</p>
		
		</section>
		<br><br>

		<section class="Principal">
		<h3 align="center">Personal de seguridad calificado</h3><br><br>
		<p align="center">Nuestra empresa se caracteriza por <br>su excelente servicio y su confiabilidad<br><br></p>
		<img src="../../img/guardia.png" alt="" class="info1">
		<h3 align="center"><br><br>Contamos con diferentes sucursales</h3><br><br>
		<p align="center">Diferentes sucursales para<br>estar mas cerca de ti<br>Pedro Carbo/Guayaquil/Quito<br><br></p>
		<img src="../../img/Mapa.jpg" alt="" class="info1">
		<h3 align="center"><br><br>Atencion al cliente 24/7</h3><br><br>
		<p align="center">Brindamos atencion a nuestros queridos<br>clientes a cualquier hora y dia del año<br><br></p>
		<img src="../../img/atencionc.png" alt="" class="info1">
		</section>
		


		<p><a href="../cierre.php">Cerrar Sesion</a></p>
</body>
</html>