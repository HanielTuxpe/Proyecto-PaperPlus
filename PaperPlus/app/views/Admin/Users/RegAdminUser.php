<link rel="stylesheet" href="app/css/ProvsStylesNews.css">
<div class="content-RegistroUser">
    <h4>Crear Usuario ADMINISTRATIVO</h4>
    <div class="Usuario-img">
        <img src="app/img/6073873.png" alt="#">
    </div>
    <form action="http://localhost/PaperPlus/?C=User_Controller&M=RegNewEmp" method="post">
        <input class="control" type="text" name="txtName" id="Name" placeholder="Nombre" required maxlength="20" pattern="[A-Za-z]?+">
        <input class="control" type="text" name="txtAp" id="Name" placeholder="Apellido Paterno" required maxlength="20" pattern="[A-Za-z]?+">
        <input class="control" type="text" name="txtAm" id="Name" placeholder="Apellido Materno" required maxlength="20" pattern="[A-Za-z]?+">
        <input class="control" type="text" name="txtUser" id="UserN" placeholder="Usuario" required maxlength="12">
        <input class="control" type="E-mail" name="txtEmail" id="Email" placeholder="E-mail" required>
        <input class="control" type="text" name="txtNum" id="Num" placeholder="Número Telefónico" required maxlength="10">
        <input class="control"  type="text" name="txtRFC" id="RFC" placeholder="RFC" required maxlength="13" pattern="([A-Z]{4})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])([A-Z]{2})[\d]">
        <input class="control" type="password" placeholder="Contraseña" name="txtpsswd" id="psswd1" required>
        <input class="control" type="password" placeholder="Contraseña" name="txtpsswdc" id="psswdcon" required>
        <select class="control" name="selectCrg" id="charge">
            <option class="control" value="Admin">Admin</option>
            <option class="control" value="Empleado">Empleado</option>
        </select>
        <input class="RegistroUser" type="submit" value="Registrarse">
    </form>
</div>
<div class="Tablas-Principal">
	<div class="content-tabla" >
	<h4>Lista de Empleados</h4>
    <div class="scroll">
    <table class="centered-table">
        <thead>
            <tr>
                <th>Id Usuario</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($users = $datos->fetch_object()) {
                echo '<form class="form" action="http://localhost/PaperPlus/?C=User_Controller&M=EditxDel" method="POST">';
                echo '<tr>';
                echo '<td> <input type="text" name="IdUsser" value="'.$users->IdEmpleado.'" readonly> </td>';
                echo '<td> <input type="text" name="txtnombre" value="'.$users->Nombre.'" ></td>';
                echo '<td> <input type="text" name="txtusser" value="'.$users->NomUsuario.'" ></td>';
                echo '<td> <input type="text" name="txttel" value="'.$users->Telefono.'" ></td>';
                echo '<td> <input type="text" name="txtemail" value="'.$users->Email.'" ></td>';
                echo '<td><select name="cargo" class="form-control">';
                    echo '<option value="'.$users->Tipo.'">'.$users->Tipo.'</option>';
                    foreach($datostpo as $rowsc) {
                        echo '<option value="'.$rowsc->Tipo.'">'.$rowsc->Tipo.'</option>';
                    }
                    echo '</select></td>';
                echo '<td> <button type="submit" name="bttnEdit" value="BttnAct">Editar</button><br>
                        <button type="submit" name="bttnDel" value="BttnDelete">Eliminar</button></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>    
</div>