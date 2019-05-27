<html>
  <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      .color{
        background-color: #FFFC88;
        border: 1px solid black;
      }
      .negrita{
        font-weight:bold;
        text-align: center;
      }

    </style>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Ciudad: <select name="ciudad" id="ciudad">
              <option value="5641X">Écija</option> 
              <option value="5656">Fuentes de Andalucia</option>
              <option value="5998X">Osuna</option>
              <option value="5702X">Carmona</option>
              <option value="5704B">Cazalla de la Sierra</option>
              <option value="5612B">La Roda de Andalucía</option>
              <option value="5612X">Lora de Estepa</option>
              <option value="5796">Morón de la frontera</option>
              <option value="5835X">Carrión de los Céspedes</option>
          </select>
    <button type="submit" name="enviar" value="enviar">Consultar</button>
</form>

<?php
if(isset($_POST["enviar"])){
$ciudad = $_POST["ciudad"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/".$ciudad."/?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJkYXZpZG1vcmFubzkxQGdtYWlsLmNvbSIsImp0aSI6IjZjZDhiNWNhLTVlNGEtNDU5YS04ZmE0LTRlZjc1NzI0OTQwZCIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNTUwMTM3MTkwLCJ1c2VySWQiOiI2Y2Q4YjVjYS01ZTRhLTQ1OWEtOGZhNC00ZWY3NTcyNDk0MGQiLCJyb2xlIjoiIn0.ruszcRP7lOZ4BmDWG9k0q44E5rrf2lM9V4Cx7LQMCVw",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}else{
  $json = json_decode($response,true);
  $tiempo = $json["datos"];
  //print_r($tiempo);


  curl_setopt_array($curl, array(
    CURLOPT_URL => $tiempo,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
    ),
  ));

  $respuesta = utf8_encode(curl_exec($curl));
  $err = curl_error($curl);
  $resp = json_decode($respuesta,true);
  foreach($resp as $clave => $valor){
    foreach($valor as $clave1 => $valor2){
      if($clave1 == 'ubi'){
        $ciudad = $valor2;
      }
    }
  }
  print('<span class="negrita">'.$ciudad.'</span><hr/><br/><br/>');
  foreach($resp as $clave => $valor){
    print('<div class="color">');
    foreach($valor as $clave1 => $valor2){
      if($clave1 == 'fint'){
        $fecha = substr ( $valor2,11,5);
    print ('<span class="negrita">Hora:</span> '.$fecha.'<hr/><br/><br/>');
      }
      if($clave1 == 'ta'){
    
    print ('<span class="negrita">Temperatura ambiente:</span> '.$valor2.'<br/><br/>');
      }
      if($clave1 == 'hr'){        float:left;

        print ('<span class="negrita">Humedad:</span> '.$valor2.'%<br/><br/>');
      }
      if($clave1 == 'vmax'){
        print ('<span class="negrita">Velocidad máxima del viento:</span> '.$valor2.'km/h<br/><br/>');
      }
     
    }
    print('</div>');
    print('<hr/><br/><br/>');
  }

}
}
?>
</body>
</html>


