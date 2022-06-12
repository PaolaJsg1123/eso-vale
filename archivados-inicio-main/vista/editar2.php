<?php
require_once('layouts/header.php');
?>
 <div class="contenido">
        <div class="text">
<h2>EDITAR TAREA</h2>
<form action="" method="get">
    <?php
    foreach($dato as $key => $value):
        foreach($value as $v):
        ?>
        <div class="edit_tarea2">
    <input name="titulo" class="tit" value="<?php echo $v['titulo'] ?>" placeholder="Titulo de la tarea" type="text" required="required" ><br>
        <div class="bloc">
    <label for="mensaje"> <strong>Descripción</strong> </label>     <br>
    <textarea  required="required" name="mensaje" id="mensaje" cols="100" rows="10"><?php echo $v['descripcion'] ?></textarea>  <br>
    </div>

    <div class="bloc">
    <label for="fecha"> <strong>Fecha</strong> </label><br>

<input required="required" value="<?php echo $v['fecha_finalizacion'] ?>" type="date" id="fecha" name="fecha"

min="2022-01-01" max="3000-01-01"> <br>
</div>

<div class="bloc">
<label for="color" > <strong>Color</strong> </label><br>

<select required="required" value="<?php echo $v['color'] ?>" name="color" id="color">

<option value="#9795FE">Morado</option>
<option value="#9ce9ef">Azul</option>
<option value="#8bf4cc">Verde</option>

</select> <br> <br>
</div>
<input type="hidden" value="<?php echo $v['id'] ?>" name="id"> <br>
    <input type="submit" class="submit-notas btn3" value="Editar">
    <input type="hidden" name="n" value="actualizar2"> 
        </div>
    <?php
        endforeach;
    endforeach;
    ?>
</form>

        
        </div>
 </div>
 <script src="vista/script.js"></script>
 <?php
require_once('layouts/footer.php');
?>