
<?php
  require_once("layouts/header5.php");
?>

<div class="registro">
<i class="fa-solid fa-user-plus" name="re"></i>

<h1>Registro de usuario</h1>   
<form action="" method="get">


<div class ="pa">
         
         <div class="nombre">
            
             <input type="text" required placeholder="Nombre" name="nombre">
        
           
         </div>
         
         <div class="apellido">
             <input type="text" required placeholder="Apellido" name="apellido">
          
         </div> 
     </div>
   
     <div class="pa2">
          <div class="username">
             <input type="text" required placeholder="Nombre de Usuario" name="n_usuario"> 
 
         </div>
         
         <div class="password">
             <input type= "password" required placeholder=" Contraseña" name="contrasenia">
            
 
         </div>
     </div>
     
     <div class="pa3">
         <div class="email">
             <input type="email" required placeholder="Correo" name="correo">
         </div>
 
         <div class="passwordagain">
             <input type="password" required placeholder="Confirmar contraseña">
         </div>
     </div>
    
     <div class="aceptar">
 
         He leido y acepto los terminos
    </div>

    <input type="submit" class="btn btn-1" name="btn" value="GUARDAR"><br>
    <input type="hidden" name="n" value="guardaru">
</form>
<form action="" method="get">
   <!-- para iniciar sesion en tal caso -->
   <input type="submit" class="btn btn-1 margin" name="btn" value="Iniciar sesion"><br>
    <input type="hidden" name="n" value="iniciar">
</form>
</div>
<?php 
require_once("layouts/footer.php");
?>