<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
  }
  if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
      case "admin":
          header('Location: ../paginas/admin/index2.php');
        break;

      case "cliente":
          header('Location: ../paginas/cliente/index3.php');
        break;

        default:
    }
  }
  // LLamado de la conexion de la base de datos, hacemos  una comparacion con el usuario y contraseña //
  // con los datos brindados por el usuario y la base de datos. //
  // La comparacion se hace en la taabla usuarios con el correo y contraseña //

  require 'database.php';
  if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT * FROM usuarios WHERE correo = :correo AND password = :password');
    $records->bindParam(':correo', $_POST['correo']);
    $records->bindParam(':password', $_POST['password']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
      $_SESSION['user_id'] = $results['Id'];
      $_SESSION['rol'] = $results['tipo'];
       // Segun el rol que tenga el usuario, lo va a direccionar si es cliente o administrador //
      switch ($_SESSION['rol']) {
      case "admin":
          header('Location: ../paginas/admin/index2.php');
        break;

      case "cliente":
          header('Location: ../paginas/cliente/index3.php');
        break;

        default:
      }
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
  <!-- Stilos bootrastrap de la carpeta css -->
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body >
	<?php require '../temporales/header.php'?>

	   <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <center>
     <!--h2 nos permite ingresar un texto grande-->
    <h2 style=" font-family: Georgia, 'Times New Roman', serif;">Bienvenido al terminal terrestre de Guayaquil</h2>
  
    <h2 style=" font-family: Georgia, 'Times New Roman', serif;">Inicie Sesion</h2>
  	</center>

	<form  class="forma2" action="login.php" method="post">
 <!--input donde el usuario va a ingresar su correo-->
		<input name="correo" type="text" placeholder="Ingrese su correo">
<!--input donde el usuario va a ingresar su contraseña-->
		<input name="password" type="password" placeholder="Ingrese su contraseña">
		<input type="submit"  class="btn1" value="submit">
	</form>
  <!--Este form tiene la direccion donde esta el html new para poder crear un nuevo usuario -->
  <form class="forma2" action="..\Vista\Usuario\new.html" method="post"> 
  <input  type="submit"  class="btn2" value="Registro">
  </form>
</body>
</html>