<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family-Montserrat:wght@3008display-swap" rel="stylesheet">
    <title>LOGIN</title>
</head>

<body>
    <header>
        <div class="caja">
            <h1><img src="imagenes/logo.png"></h1>
            <nav>
                <ul class="navegacion">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h2 class="titulo-principal">LOGIN</h2>
        <div>
            <form name="form" action="verifica.php" method="post">
                <div>
                    <div>
                        <label for="user">CORREO</label>
                        <input type="text" name="user" class="input-padron" placeholder="email@dominio.com" required>
                    </div>

                    
                    <div>
                        <label for="passw">PASSWORD</label>
                        <input type="password" name="passw" class="input-padron" placeholder="***********" required>
                    </div>
                    <div>
                        <br>
                   <!--      Mostrar el CAPTCHA -->
                        <label for="captcha">Ingresa el texto que ves en la imagen:</label><br>
                        <img src="class/captcha.php" alt="CAPTCHA"><br>
                        <input type="text" id="captcha" name="captcha" required><br>
                   <!--    Botón de inicio de sesión -->
            
                        <input type="submit" class="enviar" value="Iniciar sesión">
                    </div>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <img src="imagenes/logo-blanco.png" alt="Logo de la Barberia Alura">
        <p class="copyright">&copy Copyright Barberia Alura - 2020</p>
    </footer>
</body>
</html>
