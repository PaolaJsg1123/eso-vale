<?php
  require_once("layouts/header6.php");
?>
<form action="" method="get">
  <section>
          <div class="restablecer">

              <label >Correo</label><br>
              <input type="email" required="" name="correo">
              <br>
              <label >Nueva Contraseña</label><br>
              <input type="password" required=""  name="contrasenia">
              <br>
              <label>Confirmar contraseña</label><br>
              <input type="password" required=""  >
              <br>
              <input type="submit" value="Enviar">
              <input type="hidden" name="n" value="actualizaru"> 
            
      </div>
      </section>
      
      <aside>
          <ul>
              <li>Debe contener minimo un digito</li><br>
              <li>Debe contener una mayuscula como minimo</li><br>
              <li>Debe contener un caracter no alfanumerico</li><br>
              </ul> 
    
      </aside>

</form>

<?php
  require_once("layouts/footer.php");
?>