<?php

session_start();

if(!isset($_SESSION['insta_login'])){
  header('location: index.php');
}

?>
<!doctype html>
<html>
  <head>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' type='text/css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js'></script>
  </head>
  <body style="background-color:#B1D3F7">
  <img src="images/instagram.png" alt="Logotipo de isntagram" width="100" height="100"><br/>
    <h1 style="text-align:center; color: purple">Bienvenido a Instagram</h1><br/>
    <h2 style="text-align:center; color: #1D34EE">Hola, <?= $_SESSION['insta_login']->user->username;  ?> </h2><br/>
    <div class='container'>
      <div class='row' style='margin-top: 20px;'>
        <div class='col-md-3'>
          <img src='<?= $_SESSION['insta_login']->user->profile_picture ?>' >
        </div>
        <div class='col-md-9'>
           <p style="font-weight:bold">Usuario: <?= $_SESSION['insta_login']->user->username; ?></p>
           <p style="font-weight:bold">Nombre Completo: <?= $_SESSION['insta_login']->user->full_name; ?></p>
           <p style="font-weight:bold">Biografía: <?= $_SESSION['insta_login']->user->bio; ?></p>
           <p style="font-weight:bold">Web: <?= $_SESSION['insta_login']->user->website; ?></p>
        </div>
      </div>
    </div>

    <br/><br/>

    <div style="text-align:center">
    <input type='submit' value='Salir de Instagram'  onclick="location.href='index.php'">
    </div>
  </body>
</html>