<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/header.php';?>   
<?php require_once 'includes/aside.php';?>

<div id="main">  

   <h2>Crear entradas</h2>
   
   <p>Añade nuevas entradas al sitio</p>
   
   <form action="guardar-entradas.php" method="post" >
      
      <input type="text" name="titulo" placeholder="título">
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo'): '';?>
      
      <textarea name="descripcion" rows="4" cols="140"></textarea>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion'): '';?>
      <br/>
      
      <select name="categoria">
          <?php $categorias = obtenerCategorias($conexion);
               if (!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
          ?>
         <option value="<?=$categoria['id']?>">
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
