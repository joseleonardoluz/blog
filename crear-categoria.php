<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/header.php';?>   
<?php require_once 'includes/aside.php';?>

<div id="main">  

   <h2>Crear categorias</h2>
   
   <p>Añade nuevas categorias al sitio</p>
   
   <form action="guardar-categoria.php" method="post" >
      <input type="text" palceholder="Nueva categoria" name="categoria">         
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'categoria'):''; ?>
      <input type="submit" value="Guardar">
   </form>
   <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/footer.php'; ?>



