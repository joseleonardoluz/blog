<?php

if (isset($_POST)){
   require_once 'includes/conexion.php';
   
   if(!isset($_SESSION)){
      session_start();
   }
   
   $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexion, $_POST['titulo']): false;
   $descripcion = isset($_POST['descripcion'])? mysqli_real_escape_string($conexion,$_POST['descripcion']):false;
   $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria']: false;
   $usuario = $_SESSION['usuario']['id'];
   
   $errores = array();
   
   if (empty($descripcion)){
      $errores['descripcion'] = "La descripción no es permitida";
   }
   
   if (empty($titulo)){
      $errores['titulo'] = "El titulo no es permitido";
   }
   
   if (empty($categoria) && !is_numeric($categoria)){
      $errores['categoria'] = "La categoria no es permitida";
   }   
  
   if (count($errores) == 0) {

      if (isset($_GET['editar'])) {
         
         $entrada_id = $_GET['editar'];
         $usuario_id = $_SESSION['usuario']['id'];
         $update = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion', categorias_id = $categoria WHERE id = $entrada_id 
                    AND usuario_id = $usuario_id ";
         
         mysqli_query($conexion, $update);         
             
      }
      else {
         $insert = "insert into entradas values(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE())";
         $save = mysqli_query($conexion, $insert);
         
      }
      header("Location: index.php");
   }
   else {
      $_SESSION["errores_entrada"] = $errores;

      if (isset($_GET['editar'])) {
         header("Location: editar-entrada.php?id=". $_GET['editar']);
      }
      else {
         header("Location: crear-entradas.php");
      }
   }
}
