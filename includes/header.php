
<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php';?>
<!DOCTYPE HTML>
<html lang="es">
   <head>
      <meta charset="utf-8"/>
      <title>Blog</title>   
      <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
   </head>
   <body>
      <header id="cabcera">
         <div id="logo">
            <a href="index.php">
               RCM
            </a>
         </div>
          <!--menu-->
         <nav id="nav">
            <ul>
               <li>
                  <a href="index.php">Inicio</a>
               </li>
               <?php
               $categorias = obtenerCategorias($conexion);
               if (!empty($categorias)):
                  while ($categoria = mysqli_fetch_assoc($categorias)):
                     ?>       

                     <li>
                        <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
                     </li>  

                  <?php
                  endwhile;
               endif;
               ?>
               <li>
                  <a href="index.php">Nosotros</a>
               </li>
               <li>
                  <a href="index.php">Contacto</a>
               </li>
            </ul>
         </nav>
         <div class="clearfix">

         </div>
      </header>

     <div id="container">