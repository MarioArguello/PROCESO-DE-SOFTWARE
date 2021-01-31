<?php
  session_start();

    require '../../php/database.php';


  if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
      case "admin":
          header('Location: ../admin/index2.php');
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
	<title>Terminal Terrestre</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body background="../../img/fondo.jpg" style="background-repeat: no-repeat; background-position: center center;">
	<section class="title">
		<h1>Terminal Terrestre</h1>
	</section>
<nav class="navegacion">
		<ul class="menu">
			<li class="first-item">
				<a href="index3.php">
					<img src="../../img/noticia.png" alt="" class="imagen">
					<span class="text-item">Noticias</span>
					<span class="down-item"></span>
				</a>
			</li>

		<li>
				<a href="../../php/logout.php">
					<img src="../../img/us.jpg" alt="" class="imagen">
					<span class="text-item"><?php if(!empty($user)): ?>Bienvenido. <?= $user['usuario']; ?>
						<?php endif; ?>
					</span>
					<span class="down-item"></a></span>
				</a>
			</li>

				<li>
				<a href="ticket.php">
					<img src="../../img/boleto.png" alt="" class="imagen">
					<span class="text-item">Ticket</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="rutas.php">
					<img src="../../img/rutas.png" alt="" class="imagen">
					<span class="text-item">Rutas</span>
					<span class="down-item"></span>
				</a>
			</li>
			<li>
				<a href="carro_compras.php">
					<img src="../../img/carro.png" alt="" class="imagen">
					<span class="text-item">Carro de compras</span>
					<span class="down-item"></span>
				</a>
			</li>
			<li>
				<a href="boleteria.php">
					<img src="../../img/boleteria.png" alt="" class="imagen">
					<span class="text-item">Boleteria</span>
					<span class="down-item"></span>
				</a>
			</li>


		</ul>
	</nav>
	<section class="info">
		
		<p align="center">Bienbenido a la pagina del Terminal Terrestre de Guayaquil </p>
		
		</section>
		<br><br>

		<section class="Principal">
		<h3 align="center">Tenemos personal calificado para la seguridad de los pasajeros</h3><br><br>
		<p align="center">Nuestra empresa se caracteriza por <br>su excelente servicio y su confiabilidad<br><br></p>
	
		<h3 align="center"><br><br>Contamos con diferentes destinos</h3><br><br>
		
		<h3 align="center"><br><br>Atencion al cliente 24/7</h3><br><br>
		<p align="center">Brindamos atencion a nuestros queridos<br>clientes a cualquier hora y dia del año<br><br></p>
		
		</section>
		
</body>
</html>