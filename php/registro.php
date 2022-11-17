<?php
include("db.php");
session_start();

if (isset($_POST['Comenzar'])) {
    try {
        $firstNameInput = $_POST['firstNameInput'];
        $emailInput = $_POST['emailInput'];
        $passInput = $_POST['passInput'];
        $invoiceInput = trim($_POST['invoiceInput']);
        $_SESSION['invoice'] = trim($_POST['invoiceInput']);  
        if((strlen($firstNameInput) > 0) && (strlen($passInput) > 0) && (strlen($invoiceInput) > 0) ){
            $query = $connection->prepare("INSERT INTO polla(nombre, correo, telefono, factura, fecha) VALUES ('$firstNameInput','$emailInput','$passInput','$invoiceInput',current_timestamp())");
            $query->execute();
         
            $result = $query->fetch(PDO::FETCH_ASSOC);
            header('location: Polla_pagina/index.php');        }
        else{
            session_destroy();
            echo '<script language="javascript">alert("Valores vacios");</script>';  
        }


    
    } catch (Exception $e) {
        echo '<script language="javascript">alert("Error, numero de factura ya registrado");</script>';
        session_destroy();
    }

}

if (isset($_POST['Predicciones'])) {
    try{
        $invoice = $_SESSION["invoice"];
        $campeon = $_POST['campeon'];
        $subcampeon = $_POST['subcampeon'];
        $tercero = $_POST['tercero'];
        $cuarto = $_POST['cuarto']; 
       $query = $connection->prepare("INSERT INTO prediccion(factura, campeon, subcampeon, tercero,cuarto) VALUES ('$invoice','$campeon','$subcampeon','$tercero','$cuarto')");
        $query->execute();
 
       $result = $query->fetch(PDO::FETCH_ASSOC);
       session_destroy();

       header('location: https://formfit.com.co');
    }    
    catch (Exception $e) {
        //echo '<script language="javascript">alert("Error, numero de factura ya registrado");</script>';
        echo"Error".$e;
        session_destroy();
    }

}
?>