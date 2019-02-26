<?php require_once 'includes/conexion.php';?>      
<?php require_once 'includes/helpers.php';?>      

   <?php
    $entrada_actual = conseguirEntrada($conexion, $_GET['id']);
     
    if (!isset($entrada_actual['id'])){
       header("Location: index.php");
    }
   ?>

<?php require_once 'includes/header.php';?>      
<?php require_once 'includes/aside.php';?>

<div id="main">  

   <h2><?= $entrada_actual['titulo'] ?></h2>
   
   <a href="categoria.php?id=<?=$entrada_actual['categorias_id']?>">
      <span class="seccion"><?= $entrada_actual['categoria'] . " | " . $entrada_actual['fecha'] ?></span>      
   </a>
   <br/>
   <br/>
   <p><?=$entrada_actual['descripcion']?></p>
   <div class="botones">
   <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id'] ):?>
      <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton">Editar entrada</a>
      <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton">Borrar entrada</a>
   
   <?php endif;?>
   </div>
   <div id="ver-todas">
      <a href="entradas.php">Ver todas las entradas</a>
   </div>
</div>

<?php require_once 'includes/footer.php'; ?>

  


