<?php
//Previamente he creado una base de datos en URL//localhost/phpmyadmin
$server = "localhost"; 
//El usuario "root" es utilizado en ejemplos y configuraciones de bases de datos, 
//con el cuidadoque al Usar "root" otorga más privilegios de los necesarios, lo que representa un riesgo de seguridad 
//en caso de un acceso no autorizado.
$username = "root";
$password = ""; // Deja en blanco si no hay contraseña
$database = "tareasemana7_database";

//try block:En este bloque, intentamos ejecutar cierto código que puede generar una excepción. En este caso, estamos tratando 
//de establecer una conexión a la base de datos utilizando PDO (PHP Data Objects) para interactuar con una base de datos MySQL.
try {
//Intentamos crear una nueva instancia de la clase PDO, que representa una conexión a la base de datos. Si algo va mal durante 
//esta operación (por ejemplo, no se puede establecer la conexión por alguna razón), se lanzará una excepción.
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
//catch block:Aquí, estamos capturando excepciones de tipo PDOException. Si se lanza una excepción de este tipo dentro del bloque try, 
//el flujo de ejecución se desvía a este bloque catch. El parámetro $error captura la instancia de la excepción que se ha lanzado.
} catch (PDOException $error) {
//En este bloque, estamos manejando la excepción capturada. Utilizamos la función die() para terminar la ejecución del script y mostrar 
//un mensaje de error que incluye el mensaje de la excepción ($error->getMessage()). Esto proporciona información sobre el problema 
//que ocurrió durante la conexión a la base de datos.
    die("Error al conectar: " . $error->getMessage());
//En resumen, este bloque try-catch intenta establecer una conexión a la base de datos utilizando PDO. Si algo sale mal 
//durante la conexión (por ejemplo, credenciales incorrectas o servidor inaccesible), se lanza una excepción de tipo PDOException. 
//Esta excepción se captura en el bloque catch, donde se muestra un mensaje de error con información detallada sobre la excepción, 
//ayudando así a entender y abordar el problema de manera adecuada.
}
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}
