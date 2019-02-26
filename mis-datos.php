<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/header.php';?>   
<?php require_once 'includes/aside.php';?>

<div id="main">
   <h2>Mis datos</h2>
   
     <?php if (isset($_SESSION['completado'])): ?>
         <div class="alerta alerta-exito">
            <?= $_SESSION['completado'] ?>
         </div>

      <?php elseif(isset($_SESSION['errores']['general'])): ?>
         <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general'] ?>
         </div>

      <?php endif; ?>


      <form action="update-user.php" method="post">

         <label for="nombre">Nombre</label>
         <input type="text" name="nombre" id="nombre"> 
         <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):''; ?>

         <label for="apellidos">Apellidos</label>
         <input type="text" name="apellidos" id="apellidos"> 
         <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos'):''; ?>

         <label for="email">Email</label>
         <input type="email" name="email" id="email">  
         <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'):''; ?>

         <input type="submit" value="Actualizar" name="submit">
      </form>
      <?php borrarErrores(); ?>
   
   <h3>Nuevo nombre: <?php echo $_SESSION['usuario']['nombre'];?></h3>
   <br/>
   <h3>Nuevo apellido: <?php echo $_SESSION['usuario']['apellido'];?></h3>
   <br/>
   <h3>Nuevo email: <?php echo $_SESSION['usuario']['email'];?></h3>

</div>

<?php require_once 'includes/footer.php'; ?>

