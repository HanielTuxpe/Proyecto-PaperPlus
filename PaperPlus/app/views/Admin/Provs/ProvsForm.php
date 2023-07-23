<link rel="stylesheet" href="app/CSS/ProvsStylesNews.css">
<script src="app/JS/Provs.js"></script>
<div class="content-RegistroUser">
    <h4>Añadir Nuevo Proveedor</h4>
    <div class="Usuario-img">
        <img src="app/img/provs.png" alt="#">
    </div>
    <form action="http://localhost/PaperPlus/?C=Provs_Controller&M=RegNew" method="post">
        <input class="control" type="text" name="txtNameProv" id="NameProv" placeholder="Nombre del Provedor" required maxlength="50" pattern="[A-Za-z]?+">
        <input class="control" type="tel" name="txtNumber" id="Number" placeholder="Número de Contacto" required minlength="10">
        <input class="control" type="E-mail" name="txtEmail" id="Email" placeholder="E-mail" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
        <input class="RegistroUser" type="submit" value="Registrarse">
    </form>
</div>
<div class="Tablas-Principal">
	<div class="content-tabla" >
	<h4>Lista de Proveedores</h4>
    <div class="scroll">
    <table class="centered-table">
        <thead>
            <tr>
                <th>Id Proveedor</th>
                <th>Nombre</th>
                <th>telefono</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($consulta as $provs) {
                echo '<form class="form" action="http://localhost/PaperPlus/?C=Provs_Controller&M=Edit" method="POST">';
                echo '<tr>';
                echo '<td> <input type="text" name="IdProv" value="'.$provs->IdProv.'" readonly> </td>';
                echo '<td> <input type="text" name="txtnombre" value="'.$provs->Nombre.'" ></td>';
                echo '<td> <input type="text" name="txttel" value="'.$provs->Telefono.'" ></td>';
                echo '<td> <input type="text" name="txtemail" value="'.$provs->Email.'" ></td>';
                echo '<td> <button type="submit" name="bttnEdit" value="BttnAct">Editar</button><br><button onclick="Delete('.$provs->IdProv.')">Eliminar</button></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>    
</div>