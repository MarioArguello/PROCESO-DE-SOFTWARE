<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['stats_stat_correlation(arr1, arr2)']) 
   && !empty($_POST['cedula']) && !empty($_POST['usuario']) && !empty($_POST['password'])){
    $sql = "INSERT INTO usuarios (nombre, apellido, telefono, email, cedula, usuario, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':cedula', $_POST['cedula']);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':usuario', $_POST['usuario']);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php require '../temporales/header.php'?>

	 <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

	<h1>Registrese</h1>
	<span>o <a href="login.php">Inicie Sesion</a></span>

    <form action="signup.php" method="POST">
     <input name="nombre" type="text" placeholder="Ingrese su nombre">
      <input name="apellido" type="text" placeholder="Ingrese su apellido">
      <input name="telefono" type="text" placeholder="Ingrese su telefono">
      <input name="correo" type="text" placeholder="Ingrese su correo">
      <input name="cedula" type="text" placeholder="Ingrese su cedula">
      <input name="usuario" type="text" placeholder="Ingrese su usuario">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Submit">	
    </form>

</body>
</html>