<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/CSS/style.css">
  
    <title>FiftyFive</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/8aca401b21.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="header-icono">
            <i class="fas fa-bars" id="btn"></i>
            <h1>Fifty Five</h1>
        </div>
        <form action="" method="get">
            <input type="search" name="titulo" id="buscar" placeholder="Buscar por titulo...">
           <input type="submit" class="btn4" name="n" value=Buscar></input>
    <input type="hidden" name="n" value="buscar"> 
        </form>
        <div class="avatar">
        </div>
    </header>
    <div class="sidebar active">
        <ul class="nav_list">
            <li>
                <!-- Inicio -->
                <a href="index.php?n=inicio">
                    <i class="fa-solid fa-house"></i>
                    <span class="links_name">Inicio</span>
                </a>
            </li>

            <li>
                <!-- Tareas -->
                <a href="index.php?n=index">
                    <i class="fa-solid fa-book"></i>
                    <span class="links_name">Tareas</span>
                </a>
              
            </li>

            <li>
                <!-- Archivados -->
                <a href="index.php?n=paginaArch">
                    <i class="fa-solid fa-box-archive"></i>
                    <span class="links_name">Archivados</span>
                </a>
             
            </li>

            <li>
                <!-- Papelera -->
                <a href="index.php?n=paginaPapelera">
                    <i class="fa-solid fa-trash"></i>
                    <span class="links_name">Papelera</span>
                </a>
              
            </li>

            <li>
                <!-- Datos personales -->
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <span class="links_name">Datos personales</span>
                </a>
            </li>

            <li>
                <!-- cerrar sesion -->
                <a href="index.php?n=nuevo">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="links_name">Cerrar sesion</span>
                </a>
              
            </li>
        </ul>
    </div>