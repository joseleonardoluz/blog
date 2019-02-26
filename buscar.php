     
   <?php
    if (!isset($_POST['busqueda'])){
      header("Location: index.php");
   }

   ?>

<?php require_once 'includes/header.php';?>      
<?php require_once 'includes/aside.php';?>

<div id="main">  


   <h2>Busqueda: <?$_POST['busqueda']?></h2>

   <?php
    $entradas = conseguirEntradas($conexion, null, null, $_POST['busqueda']);
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

  