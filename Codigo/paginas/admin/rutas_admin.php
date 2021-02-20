<?php
  session_start();
  // llamado de la conexión de la base de datos //
    require '../../php/database.php';

  if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {

      case "cliente":
          header('Location: ../cliente/index3.php');
        break;

        default:
    }
  }	
 // me permite optener las Id de la tabla usuarios //
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM usuarios WHERE Id = :id');
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
	<!-- Stilos bootrastrap de la carpeta css-->
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>

<body>
	
  		<br/><br/>
		  <!-- titulo  -->
		<h1  align="center" style=" font-family: Georgia, 'Times New Roman', serif;">Terminal Terrestre</h1>
		<br/>	<br/>

		<!-- Menu con diseño bootstraps  -->
		<!--El elemento HTML <nav> representa una sección de una página cuyo propósito es proporcionar enlaces de navegación  -->
<nav class="navegacion">
<!--Para definir una lista desordenada en HTML utilizamos el elemento ul.  -->
		<ul class="menu">
<!--Para representar los elementos de la lista desordenada utilizamos el mismo elemento que con las listas ordenadas, es decir, el elemento li.  -->
		
			<li class="first-item">
				<a href="index2.php">
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
				<a href="ticket_admin.php">
					<img src="../../img/boleto.png" alt="" class="imagen">
					<span class="text-item">Ticket</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="rutas_admin.php">
					<img src="../../img/rutas.png" alt="" class="imagen">
					<span class="text-item">Rutas</span>
					<span class="down-item"></span>
				</a>
			</li>

<li>
				<a href="..\..\Vista\Usuario\new_ticket.php">
					<img src="../../img/boleteria.png" alt="" class="imagen">
					<span class="text-item">Ingresar Ticket</span>
					<span class="down-item"></span>
				</a>
			</li>
		</ul>
	</nav>
	
	<br/><br/>
<!--Titulo  -->
		<h1 align="center" style=" font-family: Georgia, 'Times New Roman', serif;">Mapa </h1>
		
	
		<br/><br/>
<center>
	<!-- Mapa de google Maps   -->
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63795.66151378121!2d-79.93978692089843!3d-2.0643840000000058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sec!4v1612419979749!5m2!1ses!2sec" width="1100" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</center>
<br/><br/>
		
</body>
</html>