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
$jsonraw =  $twitterObject->getTweets($_POST['usuarioTwitter'], $_POST['numTwits']);
$rawdata =  $twitterObject->getArrayTweets($jsonraw);
$twitterObject->displayTable($rawdata);

?>
</body>
</html>