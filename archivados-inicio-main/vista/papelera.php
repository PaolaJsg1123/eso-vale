
<?php
require_once('layouts/header.php');
?>
 <div class="contenido">
        <div class="text">
        <h2>Papelera</h2>
<hr>
<?php
     if(!empty($dato)):
        foreach($dato as $key => $value)
            foreach($value as $v):?>
                    <div class="grid--recuadro " style="background-color:<?php echo $v['color'] ?>; ">
                        <h3><?php echo $v['titulo'] ?> </h3>
                        <p><?php echo $v['descripcion'] ?> </p>
                        <p><?php echo $v['fecha_finalizacion'] ?> </p>
                        <p>
                        <div class="contenedor-iconos2">
                                  <a href="index.php?n=editar&id=<?php echo $v['id']?>"><i class="fa-solid fa-pen-to-square iconos2"></i></a>
                                  <a href="index.php?n=archivar&id=<?php echo $v['id']?>"><i class="fa-solid fa-box-archive iconos2"></i></a>
                                  <a href="index.php?n=sacarPapelera&id=<?php echo $v['id']?>"><i class="fa-solid fa-trash-can iconos2"></i></a> 
                                  <a href="index.php?n=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('¿Estas seguro de eliminar?'); false"><i class="fa-solid fa-circle-xmark iconos2"></i></a> 
                            </div>
                        </p>
                    </div>
         <?php endforeach; ?>
     <?php else: ?>            
                <div class="contenido">
                <div class="papelera">
<div >
    <div >
     
      <p class="lead">Las tareas o anotaciones se eliminarán
        permanentemente despúes de 7 días</p>

        <p class="icono-papelera" > <i class="fa-solid fa-trash"></i></p>
    </div>
  </div>

</div>
                </div>
     <?php endif ?>
        </div>
 </div>
 <script src="vista/script.js"></script>

<?php require_once('layouts/footer.php'); ?>