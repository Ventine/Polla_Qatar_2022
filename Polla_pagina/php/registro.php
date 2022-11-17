<?php
include("db.php");



/*if (isset($_POST['Comenzar'])) {
    try {
        $firstNameInput = $_POST['firstNameInput'];
        $emailInput = $_POST['emailInput'];
        $passInput = $_POST['passInput'];
        $invoiceInput = trim($_POST['invoiceInput']);       
     //   $consulta = "INSERT INTO cliente(nombre, correo, telefono, factura, fecha) VALUES ('$firstNameInput','firstNameInput','firstNameInput','firstNameInput',current_timestamp())";
        $query = $connection->prepare("INSERT INTO cliente(nombre, correo, telefono, factura, fecha) VALUES ('$firstNameInput','$emailInput','$passInput','$invoiceInput',current_timestamp())");
        $query->execute();
 
       $result = $query->fetch(PDO::FETCH_ASSOC);
        header('location: Polla_pagina/index.html');

    } catch (Exception $e) {
        echo '<script language="javascript">alert("Error, numero de factura ya registrado");</script>';
    }

}*/

if (isset($_POST['Predicciones'])) {
 
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
 
    $query = $connection->prepare("SELECT * FROM login WHERE usuario=:usuario");
    $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
       echo '<script language="javascript">alert("Error en nombre");</script>';
    } else {
        if ($contrasena == $result['contrasena']) {
            $_SESSION['user_id'] = $result['id'];
            if('A' == $result['tipo_cuenta']){header('location: admon/index.php');}
            else{header('location: menu.php');}
        } else {
            echo '<script language="javascript">alert("Error en contraseña");</script>';
        }
    }
}

?>