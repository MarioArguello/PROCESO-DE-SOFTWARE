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
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body background="../img/fondo.jpg">
	<?php require '../temporales/header.php'?>

	   <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <center>
    <h2 style=" font-family: Georgia, 'Times New Roman', serif;">Bienvenido al terminal terrestre de Guayaquil</h2>
  
    <h2 style=" font-family: Georgia, 'Times New Roman', serif;">Inicie Sesion</h2>
  	</center>
	<form  class="forma2" action="login.php" method="post">
		<input name="correo" type="text" placeholder="Ingrese su correo">
		<input name="password" type="password" placeholder="Ingrese su contraseña">
		<input type="submit"  class="btn1" value="submit">
	</form>
  <form class="forma2" action="..\Vista\Usuario\new.html" method="post"> 
  <input  type="submit"  class="btn2" value="Registro">
  </form>
</body>
</html>