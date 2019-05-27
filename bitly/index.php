<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <form action="accion.php" method="post" class="formulario">
            <fieldset>
                <legend>Formulario de datos</legend>
                <p>Introduce tu nombre: <input type="text" name="nombre" required/></p>
                <p>Introduce tu edad: <input type="number" name="edad" required/></p>
                <p>Introduce tu email: <input type="email" name="email" required></p>
                <hr><u>Listado URLs:</u>
                <p>URL 1: <input type="url" name="url1">&nbsp;&nbsp;&nbsp;&nbsp;T&iacute;tulo de p&aacute;gina: <input type="text" name="nombre1" ></p>
                <p>URL 2: <input type="url" name="url2">&nbsp;&nbsp;&nbsp;&nbsp;T&iacute;tulo de p&aacute;gina: <input type="text" name="nombre2" ></p>
                <p>URL 3: <input type="url" name="url3">&nbsp;&nbsp;&nbsp;&nbsp;T&iacute;tulo de p&aacute;gina: <input type="text" name="nombre3" ></p>
                <p>URL 4: <input type="url" name="url4">&nbsp;&nbsp;&nbsp;&nbsp;T&iacute;tulo de p&aacute;gina: <input type="text" name="nombre4" ></p>
                <p><input type="submit" id="enviar" value="Enviar" /></p>
            </fieldset>
        </form>
    </div>
    <footer>M&aacute;rquez, 2º DAW &copy; IES Luis Velez</footer>
</body>

</html>
