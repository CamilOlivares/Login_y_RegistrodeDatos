<?php
// Acceso base abreviado a la datos con "require"
require("database.php");

// Resto del código para procesar la solicitud
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Valida los valores de los campos del formulario

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $identificacion = $_POST['identificacion'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $año = $_POST['año'];
    $tipo_de_direccion = $_POST['tipo_de_direccion'];
    $falla = $_POST['falla'];
    $tecnico_asignado = $_POST['tecnico_asignado']; // Asumiendo que tienes un campo "tecnico_asignado" en tu formulario

    try {
        // Prepara una consulta SQL para insertar datos en la base de datos
        $sql = "INSERT INTO registro_vehiculos (nombre, apellido, identificacion, direccion, telefono, correo, marca, modelo, año, tipo_de_direccion, falla, tecnico_asignado) 
        VALUES ('$nombre', '$apellido', '$identificacion', '$direccion', '$telefono', '$correo', '$marca', '$modelo', '$año', '$tipo_de_direccion', '$falla', '$tecnico_asignado')";


        // Ejecuta la consulta SQL
        $conn->exec($sql);

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
