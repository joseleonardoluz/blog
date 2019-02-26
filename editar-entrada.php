<?php require_once 'includes/redireccion.php';?>
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

   <h4>Editar tu entrada:</h4>
   
   <br/>
   <h5><?=$entrada_actual['titulo']?></h5>
   
   <form action="guardar-entradas.php?editar=<?=$entrada_actual['id']?>" method="post" >
      
      <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>" >
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo'): '';?>
      
      <textarea name="descripcion" rows="10" cols="160"><?=$entrada_actual['descripcion']?></textarea>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion'): '';?>
      <br/>
      
      <select name="categoria">
          <?php $categorias = obtenerCategorias($conexion);
               if (!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
          ?>
         <option value="<?=$categoria['id']?>"
                 <?=($categoria['id'] == $entrada_actual['categorias_id']) ? 'selected = "selected': ''?>>
            <?=$categoria['nombre']?>
         </option>
          <?php
          endwhile;
          endif;
          ?>
      </select>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria'): '';?>
      
      <input type="submit" value="Guardar">
   </form>
   <?php          borrarErrores();?>
</div>




<?php require_once 'includes/footer.php'; ?>