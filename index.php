<?php include("php/registro.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon1.png">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="./styles.css">
  <title>Polla VENTINE</title>
</head>
<body>

  <div class="main-container">
    <section>
      <h1>Gana jugando la polla futbolera empresarial</h1>
      <p class="description" style="margin-bottom: 12px !important;">Ingresa tus datos personales, acierta a los resultados de los partidos del mundial de futbol Qatar 2022. </p>
    </section>

    <section>
      <div class="offer"><span>VENTINE</span> </div>
      <div class="form-container">

        <form method="POST">
        
          <input id="firstNameInput" type="text" name="firstNameInput" placeholder="Ingresa tu nombre completo">
          <div id="firstNameError" class="error-container"></div>

          <input id="emailInput" type="email" name="emailInput" placeholder="Ingresa tu correo">
          <div id="emailAddressError" class="error-container"></div>

          <input id="passInput" type="text" name="passInput" placeholder="Ingresa tu telefono">
          <div id="passError" class="error-container"></div>

          <input id="invoiceInput" type="text" name="invoiceInput" placeholder="Ingresa la cedula">
          <div id="invoiceError" class="error-container"></div>

          <input id="Comenzar" type="submit" name="Comenzar" value="Comenzar">

        </form>
        <p class="terms">Nuestros <a class="a_click" style="cursor: pointer;" >Instrucciones y condiciones del servicio</a></p>
      </div>
    </section>
  </div>

  <script src="main.js"></script>
</body>
</html> 