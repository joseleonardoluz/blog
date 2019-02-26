
<aside id="sidebar">
   
<div id="buscador" class="block-aside">
      <h3>Buscar</h3>

      <!----buscador----->
        
      <form action="buscar.php" method="post">
         <input type="text" name="busqueda">          
         <input type="submit" value="Buscar">
      </form>
   </div>
      <!----buscador----->


   <?php if (isset($_SESSION['usuario'])):?>
   <div id="usuario-logueado" class="block-aside">
      <h3>Bienvenido, <?=$_SESSION['usuario']['nombre']. ' '.$_SESSION['usuario']['apellidos']?></h3>
      <!--botones-->
      <a href="crear-entradas.php" class="boton">Crear entradas</a>
      <a href="crear-categoria.php" class="boton">Crear categorias</a>
      <a href="mis-datos.php" class="boton">Mis datos</a>
      <a href="cerrar.php" class="boton">Cerrar sesión</a>
      
   </div>
   <?php endif; ?>
   
   
   <!--Si no hay usuario muestra el login y el registro-->
   <?php if (!isset($_SESSION['usuario'])):?>  
   <div id="login" class="block-aside">
      <h3>Iniciar sesión</h3>
      
       <?php if (isset($_SESSION['error_login'])): ?>
      <div class="alerta alerta-error">
         <?= $_SESSION['error_login']?>
         </div>
      <?php endif; ?>
   
      <form action="login.php" method="post">
         <label for="email">Email</label>
         <input type="email" name="email" id="email">   

         <label for="pass">Password</label>
         <input type="password" name="pass" id="pass"> 

         <input type="submit" value="Entrar">
      </form>
   </div>

   <div id="register" class="block-aside">      
      <h3>Registrate</h3>

      <?php if (isset($_SESSION['completado'])): ?>
         <div class="alerta alerta-exito">
            <?= $_SESSION['completado'] ?>
         </div>

      <?php elseif(isset($_SESSION['errores']['general'])): ?>
         <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general'] ?>
         </div>

      <?php endif; ?>


      <form action="registro.php" method="post">

         <label for="nombre">Nombre</label>
         <input type="text" name="nombre" id="nombre"> 
         <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):''; ?>

         <label for="apellidos">Apellidos</label>
         <input type="text" name="apellidos" id="apellidos"> 
         <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos'):''; ?>

         <label for="email">Email</label>
         <input type="email" name="email" id="email">  
         <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'):''; ?>


         <label for="pass">Password</label>
         <input type="password" name="pass" id="pass">  
         <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'pass'):''; ?>


         <input type="submit" value="Registrarse" name="submit">
      </form>
      <?php borrarErrores(); ?>
   </div>
   <?php endif;?>
</aside>   

