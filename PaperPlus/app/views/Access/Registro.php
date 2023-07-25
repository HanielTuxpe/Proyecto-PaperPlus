<link rel="stylesheet" href="app/css/Registro.css">
<div class="content-Registro">
    <h4>Registro</h4>
    <form id="frmlogin" action="/PaperPlus/?C=User_Controller&M=RegClient" method="post">
        <input class="control" type="text" name="txtName" id="Name" placeholder="Nombre" required maxlength="20" pattern="[A-Za-z]?+">
        <input class="control" type="text" name="txtAp" id="Name" placeholder="Apellido Paterno" required maxlength="20" pattern="[A-Za-z]?+">
        <input class="control" type="text" name="txtAm" id="Name" placeholder="Apellido Materno" required maxlength="20" pattern="[A-Za-z]?+">
        <input class="control" type="text" name="txtUser" id="UserN" placeholder="Usuario" required maxlength="12">
        <input class="control" type="E-mail" name="txtEmail" id="Email" placeholder="E-mail" required>
        <input class="control" type="text" name="txtNum" id="Num" placeholder="Telefono" required minlength="10">
        <input class="control" type="password" placeholder="Contraseña" name="txtpsswd" id="psswd1" required>
        <input class="control" type="password" placeholder="Contraseña" name="txtpsswdc" id="psswdcon" required>
        <input class="Registro" type="submit" value="Registrar">
    </form>
</div>
<script src="app/JS/main.js"></script>