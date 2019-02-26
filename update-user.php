<?php
if (isset($_POST)){
   
   require_once 'includes/conexion.php';
   if (!isset($_SESSION)){
   session_start();
    
   }
   $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
   $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']:false;
   $email = isset($_POST['email']) ? trim($_POST['email']):false;
   
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
   
   $guardar_usuario = false;      
   
   if (count($errores) == 0) {
      $usuario = $_SESSION['usuario'];

      $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
      $isset_email = mysqli_query($conexion, $sql);
      $isset_user = mysqli_fetch_assoc($isset_email);

      if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {

         $insert = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellidos', email = '$email' WHERE id = " . $usuario['id'];

         $guardar = mysqli_query($conexion, $insert);

         if ($guardar) {
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellido'] = $apellidos;
            $_SESSION['usuario']['email'] = $email;
            $_SESSION['completado'] = "Los datos se han actualizado" . " " . $nombre;
         }
         else {
            $_SESSION['errores']['general'] = "No se pudo actualizar los datos" . " " . $nombre;
         }
      }else {
       $_SESSION['errores']['general'] = "El usuario ya existe !!!";
      }
   }
   else {
      $_SESSION['errores'] = $errores;
      
   }
}
header('Location: mis-datos.php');

