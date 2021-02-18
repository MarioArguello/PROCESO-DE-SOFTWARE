

<?php
  session_start();
  $connect = mysqli_connect("localhost:3307", "root", "", "terminalapp");
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
 </head>
<body>
	
<center> </br>
		<h1 style=" font-family: Georgia, 'Times New Roman', serif;">Terminal Terrestre</h1>
		</center></br></br>
<nav class="navegacion">
		<ul class="menu">
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

    <br/><br/><br/><br/>
<div class="container" style="width:800px;">
<br/><br/><br/>
<?php
$query = "SELECT * FROM ticket ORDER BY id ASC";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
?>
<div class="col-md-4">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?action=add&id=<?php echo $row["id"]; ?>">
<div class="thumbnail"  style=" font-family: Georgia, 'Times New Roman', serif;">
<h4 class="text-info text-center" > Destino</h4>
<h4 class="text-info text-center"><?php echo $row["name"]; ?></h4>
<h4 class="text-info text-center"> Nombre de la Cooperativa </h4>
<h4 class="text-info text-center"><?php echo $row["cooperativa"]; ?></h4>
<img src="<?php echo $row["image"]; ?>" class="img-responsive" />
<div class="caption">

<h4 class="text-danger text-center">Precio: $ <?php echo $row["price"]; ?></h4>
<h4 class="text-info text-center">Tiempo de viaje: <?php echo $row["tiempo"]; ?></h4>


</div>
</div>
</form>
</div>

<?php
}
}
?>

<link rel="stylesheet" type="text/php" href="carro.php" />
</div>
</div>
</body>
</html> 