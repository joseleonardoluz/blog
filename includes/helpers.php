<?php

function mostrarError($errores, $campo){
   $alerta = '';
   if (isset($errores[$campo]) && !empty($campo)){
      $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
   }
   return $alerta;
}

function borrarErrores(){
   if (isset($_SESSION['errores'])){
      $borrado = $_SESSION['errores'] = null;
   }
   if (isset($_SESSION['completado'])){
      $_SESSION['completado'] = null;      
   }
   
   if (isset($_SESSION['errores_entrada'])){
      $_SESSION['errores_entrada'] = null;
   }  
   return $borrado;
}

function obtenerCategorias($conexion){
   $sql = "SELECT * FROM categorias ";
   $categorias = mysqli_query($conexion, $sql);
   
   $result = array();
   if ($categorias && mysqli_num_rows($categorias) >=1){
      $result = $categorias;          
   }
   return $result;
}

function conseguirEntradas($conexion, $limit=null, $categoria = null, $busqueda = null){
   
   $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e
          INNER JOIN categorias c ON e.categorias_id = c.id ";
           
   if (!empty($categoria)){
      $sql.= "WHERE e.categorias_id = $categoria ";
   }

   if (!empty($busqueda)){
      $sql.= "WHERE e.titulo LIKE'%$busqueda%' ";
   }
   
   $sql .= "ORDER BY e.id DESC ";
   
   if ($limit){
      $sql .= "LIMIT 4";
   }
   
   $entradas = mysqli_query($conexion, $sql);
   $result = array();
   if ($entradas && mysqli_num_rows($entradas) >=1){
      $result = $entradas;
   }
   return $result;
}

function conseguirEntrada($conexion, $id){
   $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e
           INNER JOIN categorias c ON e.categorias_id = c.id WHERE e.id = $id";
   
   $entrada = mysqli_query($conexion, $sql);
   
   $result = array();
   if ($entrada && mysqli_num_rows($entrada) >= 1){
      $result = mysqli_fetch_assoc($entrada);
   }else{
   echo mysqli_error($conexion);
   die();
   }
      return $result;
   
}



function conseguirCategoria($conexion, $id) {
   $sql = "SELECT * FROM categorias WHERE id = $id";
   $categorias = mysqli_query($conexion, $sql);
   
   $result = array();
   if ($categorias && mysqli_num_rows($categorias) >=1){
      $result = mysqli_fetch_assoc($categorias);          
   }
   return $result;
}


