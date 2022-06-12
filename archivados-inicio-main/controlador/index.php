<?php
    require 'modelo/index.php';

  class ModeloController{
        private $model;
        public function __construct(){
            $this->model=new Modelo();
        }

        //Pagina de inicio 
        static function principal(){
          require_once("vista/layouts/header7.php");
        }
      
        // Iniciar en la pagina de inicio
        static function iniciar(){
          require_once("vista/login.php");
        }
          static function inicio(){
          require_once("vista/index.php");
        }

        // RESTABLECER CONTRASENIA
        static function restablecer(){
  
          require_once("vista/restablecer.php");
       }
  
        // mostrar
        public static function index(){
            $datos=new Modelo();
            $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->mostrar("tarea",0,$datix);
            require_once("vista/tareas.php");
           }
      
        // NUEVO USUARIO, REGISTRO
        static function nuevo(){
           require_once("vista/nuevo.php");
        }

        // Guardar
        static function guardar(){
          $titulo=$_REQUEST['titulo'];
          $mensaje=$_REQUEST['mensaje'];
          $color=$_REQUEST['color'];
          $fecha_inicio=date('d/m/y');
          $fecha_finalizacion=$_REQUEST['fecha'];
            $condicion=0;
            $usuario=new Modelo();
            $datu=$usuario->traerIdSesiones("sesiones");
            $datix=$usuario->traerIdUser("sesiones",$datu);
            $data="'".$titulo."','".$mensaje."','".$fecha_inicio."','".$fecha_finalizacion."','".$color."',".$condicion.",". $datix;
            
              $dato=$usuario->insertar("tarea",$data);
              header('location:'.'index.php?n=index');
         }

        //  Guardar datos de usuario
         static function guardaru(){
          $nombre=$_REQUEST['nombre'];
          $apellido=$_REQUEST['apellido'];
           $correo=$_REQUEST['correo'];
          $n_usuario=$_REQUEST['n_usuario'];
          $contrasenia=$_REQUEST['contrasenia'];
          $data="'".$nombre."','".$apellido."','".$correo."','".$n_usuario."','".$contrasenia."'";
         
          $usuario=new Modelo();
          $condicion="nombre='".$nombre."' AND apellido='".$apellido."' AND correo='".$correo."' AND n_usuario='".$n_usuario."' AND clave='".$contrasenia."'";

            if($usuario->validar_User_existente("usuario","n_usuario='".$n_usuario."'","correo='".$correo."'")){
              header('location:'.ModeloController::nuevo());
               echo "<script>alert('el nombre de usuario: $n_usuario o el correo: $correo ya estan siendo utilizados');</script>";
            }else{
              $dato=$usuario->insertar("usuario",$data);
              $datux=$usuario->traerId("usuario",$condicion);
              $dato=$usuario->insertar("sesiones",$datux);
               header('location:'.'index.php?n=iniciar');
            }
       } 

      //  actualizar usuario
      static function actualizaru(){
           
        $correo=$_REQUEST['correo'];
        $contrasenia=$_REQUEST['contrasenia'];
        $data   = "contrasenia='".$contrasenia."'";
         $datos=new Modelo();
         if($datos->validar_User_existente2("usuario","correo= '".$correo."'" )){
            $mostrar=$datos->traerid("usuario","correo= '".$correo."'");
            $dato=$datos->actualizar("usuario",$data,"id=".$mostrar);
            header('location:'.ModeloController::iniciar());
            echo "<script>alert('La contraseña fue cambiada exitosamente');</script>";
         }
         else{
          header('location:'.ModeloController::restablecer());
          echo "<script>alert('El correo: $correo  no existe');</script>";
         }
      
        }

       public static function login(){
        $usuario=$_REQUEST['n_usuario'];
        $contrasenia=$_REQUEST['contrasenia'];
         $datos=new Modelo();
         $data="n_usuario='".$usuario."' AND clave='".$contrasenia."'";
         $dato=$datos->login("usuario",$data);
         $datu=$datos->traerId("usuario",$data);
         $datix=$datos->insertar("sesiones",$datu);
        if($dato==true){
          header('location:'.'index.php?n=inicio');
        }
        else{
          echo "<script>alert('la contraseña/nombre de usuario no coinciden');</script>";
          header('location:'.'index.php?n=iniciar');
        }
      }

        // inciar busqueda
        static function buscar(){
          $titulo=$_REQUEST['titulo'];
          $data="titulo='".$titulo."'";
          $usuario=new Modelo();
            $dato=$usuario->mostrar2("tarea",$data);
            require_once("vista/tareas.php");
       }
          // editar
        static function editar(){
          $id=$_REQUEST['id'];
          $datos=new Modelo();
          $dato=$datos->mostrar2("tarea","id=".$id);
          require_once("vista/editar.php");
         }
         // editar DESDE ARCHIVADOS
        static function editar2(){
          $id=$_REQUEST['id'];
          $datos=new Modelo();
          $dato=$datos->mostrar2("tarea","id=".$id);
          require_once("vista/editar2.php");
         }
 
         // actualizar
         static function actualizar(){
            $id=$_REQUEST['id'];
             $titulo=$_REQUEST['titulo'];
            $mensaje=$_REQUEST['mensaje'];
            $color=$_REQUEST['color'];
            $fecha_finalizacion=$_REQUEST['fecha'];
            $data="titulo='".$titulo."',descripcion='".$mensaje."',color='".$color."',fecha_finalizacion='".$fecha_finalizacion."'";
             $datos=new Modelo();
             $dato=$datos->actualizar("tarea",$data,"id=".$id);
             header('location:'.'index.php?n=index');
          }
          // ACTUALIZAR TAREAS EN ARCHIVADOS
          static function actualizar2(){
            $id=$_REQUEST['id'];
             $titulo=$_REQUEST['titulo'];
            $mensaje=$_REQUEST['mensaje'];
            $color=$_REQUEST['color'];
            $fecha_finalizacion=$_REQUEST['fecha'];
            $data="titulo='".$titulo."',descripcion='".$mensaje."',color='".$color."',fecha_finalizacion='".$fecha_finalizacion."'";
             $datos=new Modelo();
             $dato=$datos->actualizar("tarea",$data,"id=".$id);
             header('location:'.'index.php?n=paginaArch');
          }
          static function archivar(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->archivar("tarea","id=".$id,1);
            header('location:'.'index.php?n=index');
          } 
          static function sacarArch(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
             $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->archivar("tarea","id=".$id,0);
             $dato=$datos->mostrar("tarea","1",$datix);
            require_once("vista/archivados.php");
          }
          static function paginaArch(){
            $datos=new Modelo();
            $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->mostrar("tarea",1,$datix);
            require_once("vista/archivados.php");
          } 

          static function papeleraArch(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->archivar("tarea","id=".$id,2);
            header('location:'.'index.php?n=paginaArch');
          }

          // PAPELERA
          static function papelera(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->archivar("tarea","id=".$id,2);
            header('location:'.'index.php?n=index');
          } 
          static function sacarPapelera(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
             $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->archivar("tarea","id=".$id,0);
             $dato=$datos->mostrar("tarea","2",$datix);
            require_once("vista/papelera.php");
          }
          static function paginaPapelera(){
            $datos=new Modelo();
            $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->mostrar("tarea",2,$datix);
            require_once("vista/papelera.php");
          }
        // Eliminar
          static function eliminar(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->eliminar("tarea","id=".$id);
            header('location:'.'index.php?n=index');
         }
           // Eliminar para archivados
           static function eliminarArchivado(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->eliminar("tarea","id=".$id);
            header('location:'.'index.php?n=paginaArch');
         }
    }
?>