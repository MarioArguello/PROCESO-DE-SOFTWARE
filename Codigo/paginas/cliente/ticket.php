
<?php
session_start();
$connect = mysqli_connect("localhost:3307", "root", "", "terminalapp");
if(isset($_POST["add_to_cart"]))
{
if(isset($_SESSION["shopping_cart"]))
{
$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["shopping_cart"]);
$item_array = array(
'item_id' => $_GET["id"],
'item_name' => $_POST["hidden_name"],
'item_price' => $_POST["hidden_price"],
'item_quantity' => $_POST["quantity"]
);
$_SESSION["shopping_cart"][$count] = $item_array;
}
}
else
{
$item_array = array(
'item_id' => $_GET["id"],
'item_name' => $_POST["hidden_name"],
'item_price' => $_POST["hidden_price"],
'item_quantity' => $_POST["quantity"]
);
$_SESSION["shopping_cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
if($values["item_id"] == $_GET["id"])
{
unset($_SESSION["shopping_cart"][$keys]);
echo '<script>alert("Producto eliminado")</script>';
echo '<script>window.location="carro.php"</script>';
}
}
}
}
?>

<?php
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	
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
<input type="number" name="quantity" class="form-control" value="" />
<p class='text-center'>
<input type="submit" name="add_to_cart" class="btn btn-success " value="Agregar al carro" /></p>
 
<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
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