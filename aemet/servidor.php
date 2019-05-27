<html>
<link rel="stylesheet" type="text/css" media="screen" href="estilo.css">
<body>
<div id="contenido">
<?php
$estacion = $_GET["estacion"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/".$estacion."/?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJlbGRlbGdhZG82QGdtYWlsLmNvbSIsImp0aSI6IjU4MzY3ZTkyLTUwYTYtNDczZi05Yjc4LTNiMTU1MTJiYmZiOSIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNTUwMTM3MTI0LCJ1c2VySWQiOiI1ODM2N2U5Mi01MGE2LTQ3M2YtOWI3OC0zYjE1NTEyYmJmYjkiLCJyb2xlIjoiIn0.-7bd6mPZk-DV7j9G1iDbYyFOOOuZPZLW8COuuAgY7I0",
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
} else {

$arrayPeticion = json_decode($response,true);
$urlServicio = $arrayPeticion["datos"];
}


curl_setopt_array($curl, array(
  CURLOPT_URL => $urlServicio,
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

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  //echo $response;
  $array = json_decode($response,true);

  //print_r($array);
  foreach ($array as $value) {
    foreach($value as $dato){
      ?>
        <h2><?php echo $value["ubi"] ?></h2>
        <div id="valorMaximo">
            <p> Valores Actuales </p>
          </div>
          <div id="viento">
          <p><?php echo $value["vv"] ?> km/h</p>
          <p>Velocidad del viento</p>
          </div>
          <div id="temperatura">
          <p><?php echo $value["ta"] ?> ºC</p>
          <p>Temperatura</p>
          </div>
          <div id="presion">
          <p><?php if(isset($value["pres_nmar"])){ echo $value["pres_nmar"];} else{echo "Sin Datos";} ?> Pa</p>
          <p>Presión</p>
          </div>
          <div id="clear">

          </div>
           <div id="valorMaximo">
            <p> Valores Máximos </p>
          </div>
          <div id="viento">
          <p><?php echo $value["vmax"] ?> km/h</p>
          <p>Velocidad del viento</p>
          </div>
          <div id="temperatura">
          <p><?php if(isset($value["tamax"])){ echo $value["tamax"];} ?> ºC</p>
          <p>Temperatura</p>
          </div>
          <div id="presion">
          <p><?php if(isset($value["pres_nmar"])){ echo $value["pres_nmar"];} else{echo "Sin Datos";}?> Pa</p>
          <p>Presión</p>
          </div>
          
      </div>
      <?php
      break;
    }
   break;
  }
}


?>
</body>
</html>