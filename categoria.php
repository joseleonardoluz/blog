<?php require_once 'includes/conexion.php';?>      
<?php require_once 'includes/helpers.php';?>      

   <?php
    $categoria_actual = conseguirCategoria($conexion, $_GET['id']);
     
    if (!isset($categoria_actual['id'])){
       header("Location: index.php");
    }
   ?>

<?php require_once 'includes/header.php';?>      
<?php require_once 'includes/aside.php';?>

<div id="main">  


   <h2>Entradas de la categoria <?= $categoria_actual['nombre'] ?></h2>

   <?php
   $entradas = conseguirEntradas($conexion, NULL, $_GET['id']);
   if (!empty($entradas) && mysqli_num_rows($entradas) >= 1):
      while ($entrada = mysqli_fetch_assoc($entradas)):
         ?>
         <article class="entrada">
            <a href="entrada.php?id=<?= $entrada['id']?>">
               <h3><?= $entrada['titulo'] ?></h3>
               <p>
                  <?= substr($entrada['descripcion'], 0, 200) ?>
               </p>
               <span class="seccion"><?= $entrada['categoria'] . " | " . $entrada['fecha'] ?></span>
            </a>
         </article>

         <?php
      endwhile;
   else:
      ?>

      <div class="alerta">No hay entradas en esta categoria</div>
   <?php endif; ?>

   <div id="ver-todas">
      <a href="entradas.php">Ver todas las entradas</a>
   </div>
</div>

<?php require_once 'includes/footer.php'; ?>

  