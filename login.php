<?php

//iniciar sessión y la conexión a la DB
require_once 'includes/conexion.php';

if (isset($_POST)) {

   $email = trim($_POST['email']);
   $password = $_POST['pass'];

//Do query whit DB for validate credenciales of user
   $select = "SELECT * FROM usuarios WHERE email = '$email'";
   $result = mysqli_query($conexion, $select);

   if ($result && mysqli_num_rows($result) == 1) {
      $usuario = mysqli_fetch_assoc($result);

      //comprobar la contraseña
      $verifica = password_verify($password, $usuario['password']);

      if ($verifica) {
         //Utilizar una session para guardar los datos del usuario logueado         
         
         if (isset($_SESSION['error_login'])){
            
            session_unset($_SESSION['error_login']);
         }
         $_SESSION['usuario'] = $usuario;
      }else {
         $_SESSION['error_login'] = "Credenciales incorrectas";
      }
   }else {
      $_SESSION['error_login'] = "Credenciales incorrectas";
   }
   
}
//Redirect index.php
header('Location: index.php');
