<?php
  session_start();  // Inicia una sesión

  session_unset();  // Libera todas las variables de la sesión

  session_destroy();  // Destruye la sesión

  header("Location: /php-login");  // Redirige a la página '/php-login'
?>
