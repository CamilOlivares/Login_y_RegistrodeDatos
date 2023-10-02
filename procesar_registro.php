<?php
// Acceso abreviado a la base de datos con "require"
require "database.php";

// Resto del código para procesar la solicitud
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar y obtener los valores de los campos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $identificacion = isset($_POST['identificacion']) ? $_POST['identificacion'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
    $año = isset($_POST['año']) ? $_POST['año'] : '';
    $tipo_de_direccion = isset($_POST['tipo_de_direccion']) ? $_POST['tipo_de_direccion'] : '';
    $falla = isset($_POST['falla']) ? $_POST['falla'] : '';
    $tecnico_asignado = isset($_POST['tecnico_asignado']) ? $_POST['tecnico_asignado'] : '';

    try {
        // Prepara una consulta SQL para insertar datos en la base de datos
        $sql = "INSERT INTO registro_vehiculos (nombre, apellido, identificacion, direccion, telefono, correo, marca, modelo, año, tipo_de_direccion, falla, tecnico_asignado) 
        VALUES ('$nombre', '$apellido', '$identificacion', '$direccion', '$telefono', '$correo', '$marca', '$modelo', '$año', '$tipo_de_direccion', '$falla', '$tecnico_asignado')";

        // Ejecuta la consulta SQL
        $conn->query($sql);

        // Redirecciona a una página de éxito después del registro
        header("Location: registro_exitoso.php");
        exit();
    } catch (PDOException $error) {
        echo "Error en la ejecución de la consulta: " . $error->getMessage();
    }
} else {
    // Si no es una solicitud POST, redirecciona a una página de error
    header("Location: error.php");
    exit();
}
?>
