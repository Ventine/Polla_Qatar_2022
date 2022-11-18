<?php
ob_start();
include("../../php/registro.php");
$invoice = $_SESSION["invoice"];
$sentenciaSQL = $connection->prepare("SELECT * FROM cliente where '$invoice' = factura");
$sentenciaSQL->execute();
$lista=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$sentenciaSQL1 = $connection->prepare("SELECT * FROM prediccion where '$invoice' = factura");
$sentenciaSQL1->execute();
$lista1=$sentenciaSQL1->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultados-Polla</title>
  </head>
  <body>
      <style type="text/css">
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  body {
    text-align: center;
    padding: 30px;
    background: rgb(108,29,69);
    background: linear-gradient(142deg, rgba(108,29,69,1) 23%, rgba(238,238,238,1) 59%);
    background-size: cover;
    font-family: Arial;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  .a-box {
    display: inline-block;
    width: 260px;
    text-align: center;

  }
  .text-container {
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
    padding: 120px 20px 20px 20px;
    border-radius: 20px;
    background: #fff;
    line-height: 19px;
    font-size: 14px;
    border: 1px solid purple;
    margin: 8px;

  }

  .div__contain{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  .text-container h3 {
    margin-top: -40px;
    margin-bottom: 20px;
    color: purple;
    font-size: 33px;
    font-style: italic;
  }

  .text-container h2 {
    margin: 20px 0px 10px 0px;
    color: black;
    font-size: 13px;
  }

  .text-container span {
    margin: 20px 0px 10px 0px;
    color: green;
    font-weight: bold;
    font-size: 15px;
  }
  .btn__final{
    margin-top: 20px;
    background-color: #4BFF64;
    border-radius: 50px;
    height: 40px;
    width: 89px;
    color: white;
    font-size: 17px;
    font-weight: bold;
    border: 1px solid white;
  }

  .btn__final:hover{
    cursor: pointer;
    background-color: white;
    color: #4BFF64;
    border: 1px solid purple;
  }
    </style>
    <form method="POST">
      <div class="a-box">
        <?php foreach($lista as $list){ ?>
        <div class="text-container">
          <h3>PREDICCIONES</h3>
          <div class="div__contain">
            <span>Nombre:</span>
            <h2><?php echo $list['nombre'];?></h2>
          </div>
          <div class="div__contain">
            <span>Factura:</span>
            <h2><?php echo $list['factura'];?></h2>
            <?php }?>
          </div>
          <?php foreach($lista1 as $list1){?>
          <div class="div__contain">
            <span>Campeón:</span>
            <h2><?php echo $list1['campeon'];?></h2>
          </div>
          <div class="div__contain">
            <span>Subcamepeón:</span>
            <h2><?php echo $list1['subcampeon'];?></h2>
          </div>
          <div class="div__contain">
            <span>Tercero:</span>
            <h2><?php echo $list1['tercero'];?></h2>
          </div>
          <div class="div__contain">
            <span>Cuarto:</span>
            <h2><?php echo $list1['cuarto'];?></h2>
          </div>
          <?php }?>
<?php
$html = ob_get_clean();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
if (isset($_POST['Imprimir'])) {
try {
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->set_base_path('style.css');
$dompdf->loadHtml($html);
$paper_size = array(0, 0, 200, 430); /*for manual size*/
$dompdf->set_paper($paper_size);
$dompdf->render();
$dompdf->stream("Prediccion.pdf", array("Attachment" => true));
} catch (Exception $e) {
echo '<script language="javascript">alert("Error imprimir");</script>';
}
}
    if (isset($_POST['Salir'])) {
    try {
    header('location: https://formfit.com.co');
    session_destroy();
    } catch (Exception $e) {
    echo '<script language="javascript">alert("Error salir");</script>';
    session_destroy();
    }
    }
echo $html;

?>
          <div class="div__contain">
            <input  class="Imprimir btn__final" id="Imprimir" type="submit" name="Imprimir" value="Imprimir">
            <input  class="Salir btn__final" id="Salir" type="submit" name="Salir" value="Salir">
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
