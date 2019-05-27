<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Petición meteorológica</title>
<link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>
<div class="container">
  <form action="servidor.php" method="GET">
    <div class="row">
      <div class="col-25">
        <label for="country">Ciudades</label>
      </div>
      <div class="col-75">
        <select id="estacion" name="estacion">
          <option value="5641X">Ecija</option>
          <option value="5972X">San Fernando</option>
          <option value="6088X">Torremolinos</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</body>
</html>