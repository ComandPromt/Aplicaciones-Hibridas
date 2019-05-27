<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('funciones.php');

    $twitterObject = new Twitter();
    $respuesta =  $twitterObject->sendTweet($_POST['mensaje']);
    $json = json_decode($respuesta);

echo '<meta charset="utf-8">';
echo "Tweet Enviado por: ".$json->user->name." (@".$json->user->screen_name.")";
echo "<br>";
echo "Tweet: ".$json->text;
echo "<br>";
echo "Tweet ID: ".$json->id_str;
echo "<br>";
echo "Fecha Envio: ".$json->created_at;
echo "<br>";
echo '<a href="index.php">Volver</a>';
    ?>
</body>

</html>