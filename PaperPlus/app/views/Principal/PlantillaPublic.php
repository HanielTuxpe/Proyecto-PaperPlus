<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="app/img/logo.jpg" type="image/x-icon">
    <title>PaperPlus_V.1.2</title>
    <link rel="stylesheet" href="app/css/Styles.css">
</head>
<body>
   <header class="header">
    <div class="logo">
        <img src="app/img/logo.jpg" alt="logo de la marca">
    </div>
    <a href="#" class="btn" onclick="openNav()" class="Menu"><button>Menu</button></a>

    <div class="overlay" id="Movil-menu">
        <a href="#" onclick="closeNav()" class="close">X</a>
        <div class="overlay-content">
            <li><a href="http://localhost/PaperPlus/?C=Index_Controller&M=Index">Inicio</a></li>
            <li><a href="http://localhost/PaperPlus/?C=Public_Controller&M=Index">Productos</a></li>
            <li><a href="http://localhost/PaperPlus/?C=Provs_Controller&M=Index">Acerca de Nosotros</a></li>
        </div>
    </div>
    <a href="http://localhost/PaperPlus/?C=User_Controller&M=IndexView" class="btn"><button>Iniciar Sesión</button></a>
   </header>
   <script type="text/javascript" src="app/JS/ControlMenu.js"></script>
   <section class="sec">
    <?php include_once($vista)?>
   </section><br><br>
   <Footer>
    <div class="Frm-footer">
        <div class="container-body">
            <div class="colum1">
                <h1>Mas informacion de la compania</h1>
                <p>
                    Nuestro objetivo es que los clientes 
                    obtengan el mejor servicio y acceso a 
                    los materiales escolares, artículos de papelería 
                    y material didáctico para niños a su alcance y a un precio 
                    accesible, dada la necesidad que se encuentra en la localidad 
                    de San Felipe, 
                </p>
            </div>
            <div class="colum2">
                <h1>Redes sociales</h1>
                <div class="row">
                    <img src="app/img/9068642.png">
                    <label>correo</label>
                </div>
                <div class="row">
                    <img src="app/img/whatssapp.png">
                    <label>Whasap</label>
                </div>
                <div class="row">
                    <img src="app/img/png-transparent-circle-facebook-fb-round-icon-social-media-social-network-popular-services-brands-vol-icon-removebg-preview (1).png">
                    <label>Facebook</label>
                </div>
                <div class="row">
                    <img src="app/img/355975.png">
                    <label>Instagram</label>
                </div>
            </div>
            <div class="colum3">
                <h1>UBICACIÓN</h1>
                <div class="add">
                    <img src="app/img/25694.png">
                    <label>Direcion,colinia,calle</label>
                </div>
            </div>
    </div>
</div>
<div class="colum4">
  <div class="colum5">
    <div class="Copy">
        Desarrollado por Haniel Tuxpeño, Alexander Bautista, y Yair Hernández © 2023 Todos los derechos Reservados.
    </div>
  </div>
</div>
   </Footer> 
</body>
</html>
