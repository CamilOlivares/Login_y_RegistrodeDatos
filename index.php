<?php
  session_start();

  require "database.php";

  if (isset($_SESSION["user_id"])) { //Esta línea verifica si la variable de sesión "user_id" está definida. 
    //Las sesiones son utilizadas para almacenar información (en este caso, el ID del usuario) que puede ser accedida en 
    //distintas páginas de un sitio web durante la sesión de un usuario.
    $records = $conn->prepare("SELECT id, email, password FROM users WHERE id = :id");
    //Aquí se prepara una sentencia SQL para seleccionar id, email y contraseña de una tabla de la base de datos llamada 
    //"users" donde el id coincida con un parámetro llamado ":id". La función prepare se utiliza para crear una sentencia 
    //preparada, que ayuda a prevenir inyecciones SQL al permitir la vinculación de parámetros.
    $records->bindParam(":id", $_SESSION["user_id"]);
    //Esta línea vincula el valor de $_SESSION["user_id"] al parámetro ":id" en la sentencia SQL preparada. Esto ayuda a 
    //prevenir inyecciones SQL y asegura que el user_id se escape correctamente y se utilice en la consulta SQL.

    $records->execute();
    //Aquí se ejecuta la sentencia SQL preparada con los valores de parámetros proporcionados. Este es el punto donde la consulta 
    //SQL se envía a la base de datos para su ejecución.
    $results = $records->fetch(PDO::FETCH_ASSOC);
    //En esta línea se obtiene una fila del conjunto de resultados como un arreglo asociativo. La bandera PDO::FETCH_ASSOC 
    //se utiliza para obtener el resultado como un arreglo asociativo.
    $user = null;
    //Esta línea inicializa una variable llamada $user como null. Esta variable contendrá la información del usuario recuperada de la 
    //base de datos más adelante.

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   <!-- En esta primera parte html da este codigo por 
    defecto para asegurar la compatibilidas y conexion -->
    <title>Bienvenido a Car Systems</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">   <!-- Se conecta con una de las fuentes de google (Google Fonts) -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\style.css">   <!-- Conecta con el style.css en donde esta definido el estilo estetico -->
</head>
<body>

<?php require "partials/header.php" ?> <!-- Invoco el estilo de Cabecera guardado en la ruta partial/header.php"-->

    </header>
   <h1>Por Favor Ingrese Login o SignUp </h1>  <!-- Subtitulo para para indicar ingreso a los links: -->
   <a href="login.php" >login</a> or
   <a href="singup.php" >singup</a> 
</body>
</html>
