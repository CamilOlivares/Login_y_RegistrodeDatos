<?php
require "database.php";

$message = ""; // Variable para almacenar mensajes que se mostrarán al usuario

// Se verifica si 'email' y 'password' están definidos y no están vacíos en $_POST para asegurar que se haya enviado información a través de un formulario y que no esté vacía
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtiene el correo electrónico, contraseña y confirmación de contraseña de la solicitud POST
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Validación de longitud de la contraseña
    // La contraseña debe tener entre 6 y 8 caracteres
    if (strlen($password) < 6 || strlen($password) > 8) {
        $message = "La contraseña debe tener entre 6 y 8 caracteres.";
    } elseif ($password !== $confirmPassword) {
        $message = "Las contraseñas no coinciden.";
    } else {
        // La contraseña cumple con los requisitos de longitud y coincide con la confirmación de contraseña

        // Continúa con la inserción de datos en la base de datos
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

        $stmt = $conn->prepare($sql);
        // Establece una conexión a la base de datos y la asigna a la variable $conn
        // SQL que se desea preparar y ejecutar
        // Prepara la consulta SQL para su ejecución segura
        // y devuelve un objeto de sentencia preparada
        // $stmt ahora contiene la consulta SQL preparada y segura para ejecutar


        // Vincula los parámetros para la consulta SQL
        $stmt->bindParam(":email", $email); // Asocia el parámetro :email de la consulta SQL con el valor de la variable $email

        // Hashea la contraseña usando bcrypt para mayor seguridad
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $hashedPassword);
        // NOTA: "Hashear" (o "hashing" en inglés) es un proceso criptográfico que convierte una entrada (como una contraseña) 
        // en una cadena de caracteres de longitud fija, llamada "hash". Es unidireccional, lo que significa que no se puede 
        // revertir para obtener la contraseña original a partir del hash. En este caso, se está hasheando la contraseña 
        // utilizando el algoritmo bcrypt para almacenarla de forma segura en la base de datos.
        // La función password_hash en PHP se utiliza para hashear una contraseña utilizando un algoritmo de hash específico 
        // (en este caso, bcrypt) y generar un hash seguro que se puede almacenar en la base de datos.

        if ($stmt->execute()) {
            $message = "Nuevo usuario creado exitosamente"; // Mensaje para indicar que el usuario se creó con éxito
        } else {
            $message = "Lo sentimos, hubo un problema al crear tu cuenta."; // Mensaje para indicar un problema en la creación del usuario
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\style.css">
</head>
<body>
<?php require "partials/header.php" ?>

<?php if(!empty($message)): ?>
    <!-- Este bloque de código PHP está verificando si la variable $message está definida y no está vacía antes de imprimirla en un párrafo HTML. -->
    <p><?= $message ?></p>
<?php endif; ?>

<h1>SignUp</h1>
<span>o <a href="login.php">Login</a></span>

<form action="signup.php" method="post">
    <input type="email" name="email" id="Email" placeholder="Correo electrónico" required>
    <!-- Modificación: Se agregó validación de longitud de la contraseña -->
    <input type="password" name="password" id="Password" placeholder="Contraseña" minlength="6" maxlength="8" required>
    <input type="password" name="confirm_password" id="ConfirmPassword" placeholder="Confirma Contraseña" required>
    <input type="submit" value="Enviar">
</form>
</body>
</html>
