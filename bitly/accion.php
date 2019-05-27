<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        include_once("bitly.php");
        $parametros1 = array();
        $parametros2 = array();
        $parametros3 = array();
        $parametros4 = array();
        $parametros1['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxx';
        $parametros1['longUrl'] = $_POST['url1'];
        $parametros2['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
        $parametros2['longUrl'] = $_POST['url2'];
        $parametros3['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
        $parametros3['longUrl'] = $_POST['url3'];
        $parametros4['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
        $parametros4['longUrl'] = $_POST['url4'];
        $parametros1['domain'] = 'j.mp';
        $parametros2['domain'] = 'j.mp';
        $parametros3['domain'] = 'j.mp';
        $parametros4['domain'] = 'j.mp';
        $resultados1 = bitly_get('shorten', $parametros1);
        $resultados2 = bitly_get('shorten', $parametros2);
        $resultados3 = bitly_get('shorten', $parametros3);
        $resultados4 = bitly_get('shorten', $parametros4);
    ?>

    <div>
        <p>Hola <?php echo $_POST['nombre']; ?>.</p>
        <p>Usted tiene: <?php echo (int)$_POST['edad']; ?> años</p>
        <p>Su email es: <?php echo $_POST['email'];?></p>
        <p>URL 1: <?php echo ucfirst($_POST['nombre1']); echo ", URL acortada: ".'<a target="_blank" href="'.$resultados1['data']['url'].'">'.$resultados1['data']['url'].'</a>';?><br></p>
        <p>URL 2: <?php echo ucfirst($_POST['nombre2']); echo ", URL acortada: ".'<a target="_blank" href="'.$resultados2['data']['url'].'">'.$resultados2['data']['url'].'</a>';?><br></p>
        <p>URL 3: <?php echo ucfirst($_POST['nombre3']); echo ", URL acortada: ".'<a target="_blank" href="'.$resultados3['data']['url'].'">'.$resultados3['data']['url'].'</a>';?><br></p>
        <p>URL 4: <?php echo ucfirst($_POST['nombre4']); echo ", URL acortada: ".'<a target="_blank" href="'.$resultados4['data']['url'].'">'.$resultados4['data']['url'].'</a>';?><br></p>
        <span><a id="volver" href="index.php">Volver al formulario</a></span>
    </div>
    <br><br>
    <footer>M&aacute;rquez, 2º DAW &copy; IES Luis V&eacute;lez</footer>
</body>

</html>
