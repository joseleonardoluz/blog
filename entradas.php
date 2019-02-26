<?php require_once 'includes/header.php'; ?>

<?php require_once 'includes/aside.php'; ?>


<div id="main">  

   <h2>Todas las entradas</h2>

   <?php
   $entradas = conseguirEntradas($conexion);
   if (!empty($entradas)):
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
   endif;
   ?>
</div>

<?php require_once 'includes/footer.php'; ?>