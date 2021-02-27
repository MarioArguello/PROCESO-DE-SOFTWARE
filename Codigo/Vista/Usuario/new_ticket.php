
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registro Ticket</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	
	  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
  
<script type='text/javascript'>
$(function(){
	 // agregamos la id guardar del boton guardar para una ves que se de click en el boton pueda enviar los datos mediante el  //
	  // form  id="datos"   //
		$("#guardar").click(function(){ 
			$.post("../../Controlador/TrabajadorController.php",
				$("#datos").serialize(),respuesta);
			window.location.href = "..\..\php\login.php";
		});
	});
	
		
	
	function respuesta(arg)
	{
		alert(arg);
	}
	</script>
  
 
  </head>
  <body>
  
  <br/><br/>
		<h1  align="center" style=" font-family: Georgia, 'Times New Roman', serif;">Terminal Terrestre</h1>
		<br/>	<br/>
<nav class="navegacion">
		<ul class="menu">

			<li class="first-item">
				<a href="../../paginas/admin/index2.php">
					<img src="../../img/noticia.png" alt="" class="imagen">
					<span class="text-item">Noticias</span>
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
				<a href="../../paginas/admin/ticket_admin.php">
					<img src="../../img/boleto.png" alt="" class="imagen">
					<span class="text-item">Ticket</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="../../paginas/admin/rutas_admin.php">
					<img src="../../img/rutas.png" alt="" class="imagen">
					<span class="text-item">Rutas</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="new_ticket.php">
					<img src="../../img/boleteria.png" alt="" class="imagen">
					<span class="text-item">Ingresar Ticket</span>
					<span class="down-item"></span>
				</a>
			</li>
		</ul>
	</nav>
		
  
  
    <center>
      <br/>
      <h2 style="font-family:Times New Roman">Registro de Ticket</h2>   

<form  id="datos" method="POST" text-align="center"  >
<br/>
<!--seleccionamos ingresar_ticket - del switch que esta en tabajador controller  que me permite agregar los ticket  -->
<input type="text" class="form-control" name="opcion" value="ingresar_ticket" hidden />
  	<!-- Esta funcion la tiene el administrador, agregamos todos los atributos que tiene la tabla ticket para poder agregar un nuevo ticket  -->

	<label for="descripcion" class="col-lg-4 control-label" style="font-family:Times New Roman">Nombre</label>
	<!-- Agregamos atributo name de la tabla ticket -->
      <input type="text" class="form-control" id="name" name="name" placeholder="name">
  
<br/>

	<label for="descripcion" style="font-family:Times New Roman">Tiempo</label>
	<!-- Agregamos atributo tiempo de ala tabla ticket -->
      <input type="text" text-align="center" class="form-control" id="tiempo" name="tiempo" placeholder="tiempo">


<br/>

	<label for="descripcion" style="font-family:Times New Roman">Cooperativa</label>
	<!-- Agregamos atributo cooperativa de la tabla ticket -->
      <input align="center" type="text" class="form-control" id="cooperativa" name="cooperativa" placeholder="cooperativa">
    
 
<br/>

	<label for="descripcion" style="font-family:Times New Roman">Imagen "Link de la imagen"</label>
	<!-- Agregamos atributo  image de la tabla ticket -->
      <input type="text" class="form-control" id="image" name="image" placeholder="image">
   
      <br/>
    <label for="number" style="font-family:Times New Roman">Precio</label>
	<!-- Agregamos atributo price de la tabla ticket -->
    <input type="text" class="form-control" id="price" name="price" placeholder="price">
 <br/> <br/>
 <!--agregamos el boton guardar con la id: guardar para el momento de dar click envie los datos a la base de datos, tabla ticket -->
      <input type="submit" class="btn2"  id="guardar" value="Guardar">
   

</form></center>
    </body>
</html>