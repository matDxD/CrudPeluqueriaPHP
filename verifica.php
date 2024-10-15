<?php
include('./class/class_log.php');

// Crear el objeto de la clase Login
$log = new Login();

// Traer los datos del formulario de inicio de sesión
$user = $_POST['user'];
$pass = $_POST['passw'];
$captcha = $_POST['captcha'];
// Validar los datos de inicio de sesión y el CAPTCHA
$log->validar($user, $pass, $captcha);

// Generar la imagen del CAPTCHA
// Captcha::generateCaptchaImage();
?>
