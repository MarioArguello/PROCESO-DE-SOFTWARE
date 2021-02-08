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
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body background="../../img/fondo.jpg" style="background-repeat: no-repeat; background-position: center center;">
	<center> </br>
		<h1 style=" font-family: Georgia, 'Times New Roman', serif;">Terminal Terrestre</h1>
		</center></br></br>
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
				<a href="carro.php">
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
	
		<br/><br/>
		<h2 align="center" style=" font-family: Georgia, 'Times New Roman', serif;">Bienvenido al terminal terrestre de Guayaquil </h2>
		<br/>
		<img src="terminal-terrestre-guayaquil" alt="Terminal" class="img-thumbnail">
		<br/><br/>
		
		<footer class="footer">
            <div class="copyright">
                &copy; 2021 Todos los derechos reservados, Mario Arguello Calle
            </div>
        </footer>
		
</body>
</html>