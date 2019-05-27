<?php
    session_start();
    include_once("quickstart.php");

?>
<!--https://developers.google.com/calendar/quickstart/php?refresh=1#step_3_set_up_the_sample
Instalar composer, una vez que termina de descargar los paquetes los coloca dentro 
de la carpeta vendor que está definida en nuestro archivo composer.json.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

    <title>Eventos Calendario Google</title>
</head>
<body>
    <div class="header">
        <p>MI CALENDARIO DE GOOGLE</p>
    </div>
    
    <div class="description">
        <p>Abra el siguiente enlace para copiar el código de acceso al calendario:<a href='<?php echo $_SESSION['url'] ?>' target="_blank">aquí</a><p>
    </div>
    <form method='post' action="<?php $_SERVER['PHP_SELF']; ?>">
        <input type='text' class="code"  id='code' name='code' placeholder='Introduzca el código:'>
        <input type='submit' id='submit' name='submit' value='Enviar' >
    </form>
</body>
</html>