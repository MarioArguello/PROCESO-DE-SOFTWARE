<?php
  session_start();

  require 'php/database.php';

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
	<title>Bienvenido a Bodegas AVG</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['correo']; ?>
      <br>Tu estas logeado correctamente
      <a href="php/logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Por favor inicie sesion para<br>navegar en nuestra app</h1>
      <p class="inicio"><a href="php/login.php">Iniciar Sesion</a></p>
    <?php endif; ?>
</body>
</html>