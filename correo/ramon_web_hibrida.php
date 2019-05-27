<?php
function comprobar_si_existe_email($email){
$respuesta=array();

    $url = 'https://mailjagger.ga/api/validate/'.$email;

	$ch = curl_init($url);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	
curl_exec($ch);

$json=ob_get_contents();

curl_close($ch);
ob_get_clean();
$respuesta=(array)json_decode($json);



if($respuesta["valid"] || $respuesta["valid"]=="true"){
	
	return true;
}
else{

	return false;
}


}


if(isset($_POST['enviar'])){
	if(comprobar_si_existe_email($_POST['email'])){
		$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "emails");
 $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
 mysqli_query($link, "INSERT INTO email (Nombre,Email) VALUES('".$_POST['nombre']."','".$_POST['email']."')");
	print '<h1 style="text-align:center;">Email insertado correctamente!</h1>';
	}
	else{
		print '<h1>El email no existe</h1>';
	}
}

?>
<html>
<head>
<style>
input {
    width: 200px;
	height: 40px;
	text-align:center;
}
</style>
</head>
<body>
<div style="margin:auto;text-align:center;font-size:30px;width:200px;">
<form method="post" action>
<label>Introduce un email</label><br/><br/>

<input type="text" class="inputstyle" name="nombre" /><br/><br/>
<input type="email" class="inputstyle" name="email" /><br/><br/>
<input name="enviar" type="submit" />
</form>
</div>
</body>
</html>