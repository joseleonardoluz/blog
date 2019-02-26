<?php

if (isset($_POST)){
   
   require_once 'includes/conexion.php';
   if (!isset($_SESSION)){
   session_start();
    
   }
   $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
   $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']:false;
   $email = isset($_POST['email']) ? trim($_POST['email']):false;
   $pass = isset($_POST['pass']) ? $_POST['pass']:false;
   
   //Array de errores
   $errores = array();
   
   //validar campos
   if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
      $nombre_validado = true;
   }else{
      $nombre_validado = false;
      $errores['nombre'] = "El nombre no es válido";
   }
   
   if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
      $apellidos_validados = true;
   }else{
      $apellidos_validados = false;
      $errores['apellidos'] = "Los apellidos no son válidos";
   }
   
   if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
      $email_validado = true;
   }else{
      $email_validado = false;
      $errores['email'] = "El email no es válido";
   }
   
   if (!empty($pass)){
      $pass_validado = true;
   }else{
      $pass_validado = false;
      $errores['pass'] = "El pass está vacía";
   }
   
   $guardar_usuario = false;
   
   if(count($errores)== 0){
      $guardar_usuario = true;
      //cifrar el pass
      $password_segura = password_hash($pass, PASSWORD_BCRYPT, ['cost'=> 4]);    
      
      //Insertar usuario en DB
      
      $insert = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura')";
      $guardar = mysqli_query($conexion, $insert);
      
//      var_dump(mysqli_error($conexion));
//      die();
      
      if ($guardar){
         $_SESSION['completado'] = "El registro se guardó en la DB";
      }else{
         $_SESSION['errores']['general'] = "No se pudo ingresar los datos en la DB";
      }
   }else{
      $_SESSION['errores'] = $errores;
      
   }
}
header('Location: index.php');
