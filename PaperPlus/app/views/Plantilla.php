<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/6073873.png" type="image/x-icon">
    <title>PaperPlus_V.0</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
   <header class="header">
    <div class="logo">
        <img src="./img/images.png" alt="logo de la marca">
    </div>
    <nav>
        <ul class="nav_links">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Proveedores</a></li>        
            <li><a href="#">Consultas</a></li>
        </ul>
    </nav>
    <a href="#" class="btn"><button>Iniciar sesión</button></a>
   </header>
   <br><br>
   <section>
    <?php include_once($vista); ?>
   </section>
   <br><br>
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
                    <img src="./img/9068642.png">
                    <label>Correo Electrónico</label>
                </div>
                <div class="row">
                    <img src="./img/whatssapp.png">
                    <label>WhatsApp</label>
                </div>
                <div class="row">
                    <img src="./img/png-transparent-circle-facebook-fb-round-icon-social-media-social-network-popular-services-brands-vol-icon-removebg-preview (1).png">
                    <label>Facebook</label>
                </div>
                <div class="row">
                    <img src="./img/355975.png">
                    <label>Instagram</label>
                </div>
            </div>
            <div class="colum3">
                <h1>Informacion de contacto</h1>
                <div class="add">
                    <img src="./img/25694.png">
                    <label>Dirección, colonia, calle</label>
                </div>
            </div>
    </div>
</div>
<div class="colum4">
  <div class="colum5">
    <div class="Copy">
        @ 2023 Todos los derechos Reservados.
        <p>Elaborado Por: <br>
        - Haniel Antonio Tuxpeño González <br>
        - Alexander Bautista Hernández <br>
        - Yair Hernández Vázquez <br>
        </p>
    </div>
    <div class="informacion">
        <a href="#">Información de la Compañía</a> |
        <a href="#">Privacidad y Políticas </a>|
        <a href="#">Términos y Condiciones</a>
    </div>
  </div>
</div>
   </Footer> 
</body>
</html>
