<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: /registro_vehiculos.php"); // Redirige a registro_vehiculos.php
    exit();
}

// valores de configuración de Base de Datos ("database.php")
$server = "localhost";
$username = "root"; 
$password = ""; 
$database = "tareasemana7_database"; 

try {
  // Intenta establecer una conexión a la base de datos MySQL usando PDO
  $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  // En caso de error en la conexión, muestra un mensaje de error y termina la ejecución
  die("Error al conectar: " . $error->getMessage());
}

$message = "";  // Variable para almacenar mensajes

// Verifica si se han enviado datos de email y contraseña a través de un formulario POST
if (!empty($_POST["email"]) && !empty($_POST["password"])) {
  // Prepara una consulta para obtener información del usuario con el email proporcionado
  $records = $conn->prepare("SELECT id, email, password FROM users WHERE email = :email");
  $records->bindParam(":email", $_POST["email"]);  // Asocia el valor del email del formulario a la consulta
  $records->execute();  // Ejecuta la consulta
  $results = $records->fetch(PDO::FETCH_ASSOC);  // Obtiene los resultados de la consulta

  // Verifica si se encontró un usuario y si la contraseña coincide usando password_verify
  if ($results && password_verify($_POST["password"], $results["password"])) {
      $_SESSION["user_id"] = $results["id"];  // Crea una sesión de usuario con el ID del usuario
      header("Location: /registro_vehiculos.php"); // Redirige a registro_vehiculos.php
      exit();  // Termina la ejecución del script
  } else {
      $message = "Lo sentimos, esas credenciales no coinciden.";  // Mensaje de error si las credenciales no coinciden
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php require "partials/header.php" ?> <!-- Invoco el estilo de Cabecera guardado en la ruta partial/header.php"-->

<h1>Login</h1>
<span>o <a href="signup.php">SingUp</a></span>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets\css\style.css">

  <!-- En la siguiente seccion se creara el Formulario de Login -->
<form action="login.php" method="post">   <!-- El formulario HTML se envía utilizando el método POST, 
los datos del formulario se incluyen en el cuerpo de la solicitud HTTP en lugar de en la URL. 
Esto permite enviar una cantidad significativamente mayor de datos en comparación con el método GET
 y es adecuado para enviar información confidencial, como contraseñas, ya que los datos no son visibles en la URL.o -->
    <input type="email" name="email" id="Email" placeholder="Correo electrónico">
    <!-- placeholder="xx" indicara un mensaje en el interior de la casilla -->
    <input type="password" name="password" id="Password" placeholder="Contraseña">
    <!-- El input dira que una entrada y el type indicara de que tipo es junto con los otros valores -->
    <input type="submit" value="Enviar"> <!-- value indicara el nombre a interior del boton -->
</form>

</body>
</html>

