<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplicaci&oacute;n Web H&iacute;brida</title>
</head>

<body>
    <form action="mostrarTweets.php" method="post">
        <p>Usuario de Twitter sin @: <input type="text" name="usuarioTwitter" /></p>
        <p>Numero de Tweets a mostrar: <input type="text" name="numTwits" /></p>
        <p><input type="submit" value="Mostrar Tweets"/></p>
    </form>
    <form action="insertarTweet.php" method="post">
        <p>Tweet a insertar en el usuario <a href="https://twitter.com/ManuDev04330269">@xxxxxxxxxxxxxxxxxxxxx</a>: <input type="text" name="mensaje" /></p>
        <p><input type="submit" value="Insertar Tweet"/></p>
    </form>
    
</body>

</html>
