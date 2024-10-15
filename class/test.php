<?php
// Obtener los valores de la URL
$user = $_GET['user'];
$pass = $_GET['passw'];
$captcha = $_GET['captcha'];

// Mostrar los valores en la página
echo "Usuario: " . $user . "<br>";
echo "Contraseña: " . $pass . "<br>";
echo "CAPTCHA: " . $captcha . "<br>";
?>
