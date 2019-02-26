<?php

if (isset($_POST)) {

   require_once 'includes/conexion.php';    

   if (!isset($_SESSION)){
   session_start();   
   }   

   $cat = isset($_POST['categoria']) ? mysqli_real_escape_string($conexion,$_POST['categoria']) : false;  

   if (!empty($cat) && !is_numeric($cat) && !preg_match("/[0-9]/", $cat)) {
      
      $insert = "insert into categorias values(null, '$cat')";
      $guardado = mysqli_query($conexion, $insert);   
      
      if ($guardado){
         header("Location: index.php");
      }
         
   }else {
      $errores['categoria'] = "La categoria no es permitida";
     $_SESSION['errores'] = $errores;
      header("Location: crear-categoria.php");
   }
//
//   if (count($errores) == 0) {      
//
//      $insert = "insert into categorias values(null, '$cat')";
//
//      $guardado = mysqli_query($conexion, $insert);   
//      
//      if ($guardado){
//         $_SESSION['complet'] = "La categoria se guardó";
//         header("Location: crear-categoria.php");
//         
//      }else{
//         $_SESSION['complet'] = $errores;
//      }
//   }else{
//      $_SESSION['errores'] = $errores;
//      header("Location: crear-categoria.php");
//   }
}
//header("Location: index.php");

