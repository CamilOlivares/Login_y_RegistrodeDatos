<!DOCTYPE html>
<html>
<head>
    <title>Registro de Recepción de Vehículos</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <h1>Registro de Recepción de Vehículos</h1>

    <div class="container"> <!-- El elemento <div class="container"> es un contenedor que agrupa elementos relacionados. 
     Se utiliza para organizar y estructurar visualmente los contenidos dentro de una sección de la página. Se uso para para divir 
     en 2 columnas el registro y ordenar el contenido-->
        <form action="procesar_registro.php" method="post" class="column">
            <h2>Datos del Cliente</h2>
            <!-- Campo para el nombre del cliente -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        <br>
        <br>
            <!-- Campo para el apellido del cliente -->
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
        <br>
        <br>
            <!-- Campo para la identificación del cliente -->
            <label for="identificacion">Identificación:</label>
            <input type="text" id="identificacion" name="identificacion" required>
        <br>
        <br>
            <!-- Campo para la dirección del cliente -->
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        <br>
        <br>
            <!-- Campo para el teléfono del cliente -->
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
        <br>
        <br>
            <!-- Campo para el correo electrónico del cliente -->
            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" required>
    </form>

        <!-- Sección para los datos del vehículo -->
        <form action="procesar_registro.php" method="post" class="column">
            <h2>Datos del Vehículo</h2>
            <!-- Campo para la marca del vehículo -->
            <label for='marca'>Marca:</label>
            <input type='text' id='marca' name='marca' required>
        <br>
        <br>
            <!-- Campo para el modelo del vehículo -->
            <label for='modelo'>Modelo:</label>
            <input type='text' id='modelo' name='modelo' required>
        <br>
        <br>
            <!-- Campo para el año del vehículo -->
            <label for='año'>Año:</label>
            <input type='text' id='año' name='año' required>
        <br>
        <br>
            <!-- Campo para el tipo de dirección del vehículo -->
            <label for='tipo de direccion'>Tipo de Dirección:</label>
            <input type='text' id='tipo de direccion' name='tipo de direccion' required>
        <br>
        <br>
            <!-- Campo para la falla reportada en el vehículo -->
            <label for='falla'>Falla:</label>
            <input type='text' id='falla' name='falla' required>
        <br>
        <br>
            <!-- Campo para el técnico asignado al vehículo -->
            <label for='tecnico asignado'>Técnico Asignado:</label>
            <input type='text' id='tecnico asignado' name='tecnico asignado' required>

        <!-- Agrega más campos para los datos del vehículo: modelo, año, tipo de dirección, falla, técnico asignado -->
        <br>
        <br>
        <!-- Botón para enviar el formulario de registro -->
        <button type="submit">Registrar</button>
    </form>
    <br>
    <br>
    <br>
        <!-- Botón de logout (Cerrar sesión) -->
        <?php require "partials/cerrar_sesion.php" ?>
</body>
</html>
