<?php
include "instaClass.php";

$obj_insta = new instaClass();

if(isset($_POST['instagram_login'])){

  $obj_insta->authInstagram();

}
?>

<!doctype html>
<html>
  <body style="background-color: #3F33FD;">
  <h1 style="color: white">Registrate en esta página para Instagram</h1>
    <form method='post' action=''>
    <img src="images/instagram.png" alt="Logotipo de isntagram" width="100" height="100"><br/>
       <input type='submit' value='Entrar en Instagram' name='instagram_login'>
    </form>
  </body>
</html>