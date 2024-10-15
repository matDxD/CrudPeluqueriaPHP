<?php


class Captcha {
    public static function generateCaptchaText($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $captchaText = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $captchaText .= $characters[$randomIndex];
        }

        return $captchaText;
    }

    public static function generateCaptchaImage() {
        // Generar texto aleatorio para el CAPTCHA
        $captchaText = self::generateCaptchaText(4); // Genera un texto de 6 caracteres

        // Guardar el texto del CAPTCHA en la sesión
        $_SESSION['captcha_text'] = $captchaText;

        // Crear una imagen de CAPTCHA
        $imageWidth = 200;
        $imageHeight = 90;
        $image = imagecreatetruecolor($imageWidth, $imageHeight);

        // Colores para el fondo y el texto
        $backgroundColor = imagecolorallocate($image, 255, 255, 255); // Blanco
        $textColor = imagecolorallocate($image, 0, 0, 0); // Negro

        // Rellenar el fondo de la imagen con el color seleccionado
        imagefilledrectangle($image, 0, 0, $imageWidth, $imageHeight, $backgroundColor);

        // Ruta a la fuente de texto TrueType (ajusta la ruta según tu configuración)
        $fontPath = 'D:\Xampp\htdocs\Peluqueria\Roboto\Roboto-LightItalic.ttf';

        // Dibujar el texto del CAPTCHA en la imagen
        $fontSize = 40;
        $textX = 20;
        $textY = $imageHeight / 2 + $fontSize / 2;
        imagettftext($image, $fontSize, 0, $textX, $textY, $textColor, $fontPath, $captchaText);

        // Establecer las cabeceras de la respuesta para indicar que es una imagen PNG
      //header('Content-Type: image/png');

        // Mostrar la imagen PNG generada en el navegador
       imagepng($image);

        // Liberar los recursos utilizados por la imagen
        imagedestroy($image);
    }
}

// Generar el CAPTCHA
Captcha::generateCaptchaImage();
?>
