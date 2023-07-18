<link rel="stylesheet" href="app/CSS/ProvsStylesNew.css">
<script src="app/JS/ProdsFunc.js"></script>
<div class="section">
    <div class="content-RegistroUser">
        <h4>Añadir Nuevo Producto</h4>
        <div class="Usuario-img">
            <img src="app/img/6073873.png" alt="#">
        </div>
        <form action="http://localhost/PaperPlus/?C=Prods_Controller&M=RegNew" method="post" enctype="multipart/form-data">
            <input class="control" type="text" name="txtProd" id="NameProd" placeholder="Nombre del Producto" required maxlength="100" pattern="[A-Za-z]?+">
            <input class="control" type="text" name="txtDsc" id="DscProd" placeholder="Descripción General" required maxlength="100" pattern="[A-Za-z]?+">
            <input class="control" type="tel" name="txtPrv" id="Prv" placeholder="Precio de Venta" required maxlength="10">
            <select name="ProdCat" id="Cat" class="form-control">
                <?php foreach($consultaCat as $rowsc){ ?>
                    <option value="<?php echo $rowsc->IdCategoria; ?>"><?php echo $rowsc->Nombre; ?></option>
                <?php } ?>
            </select>
            <select name="ProdMark" id="Mark" class="form-control">
                <?php foreach($consultaM as $rowsc){ ?>
                    <option value="<?php echo $rowsc->IdMarca; ?>"><?php echo $rowsc->Nombre; ?></option>
                <?php } ?>
            </select>
            <input class="control" type="file" name="imgProd" id="img" accept="image/*">
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
                    <th>Id Producto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Precio Venta</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Imagen</th>
                    <th>Acción</th>
                </tr>
            </thead>
                    <tbody>
                <?php
                foreach ($consulta as $prods) {
                    echo '<form class="form" action="http://localhost/PaperPlus/?C=Prods_Controller&M=Edit" method="POST" enctype="multipart/form-data">';
                    echo '<tr>';
                    echo '<td> <input type="text" name="IdProd" value="'.$prods->IdProd.'" ></td>';
                    echo '<td> <input type="text" name="txtnombre" value="'.$prods->Nombre.'" ></td>';
                    echo '<td> <input type="text" name="txtdsc" value="'.$prods->Descripción.'" ></td>';
                    echo '<td> <span class="placeholder">'.$prods->Stock.'</span></td>';
                    echo '<td> <input type="text" name="txtPV" value="'.$prods->PrecioVenta.'" ></td>';
                    echo '<td><select name="cat" class="form-control">';
                    echo '<option value="'.$prods->IdCategoria.'">'.$prods->Categoria.'</option>';
                    foreach($consultaCat as $rowsc) {
                        echo '<option value="'.$rowsc->IdCategoria.'">'.$rowsc->Nombre.'</option>';
                    }
                    echo '</select></td>';
                    echo '<td><select name="marca" class="form-control">';
                    echo '<option value="'.$prods->IdMarca.'">'.$prods->Marca.'</option>';
                    foreach($consultaM as $rowsc) {
                        echo '<option value="'.$rowsc->IdMarca.'">'.$rowsc->Nombre.'</option>';
                    }
                    echo '</select></td>';
                    echo '<td>
                        <img src="app/SRC/prodimg/'.$prods->IMG.'" alt="Imagen del producto"><br>
                        <input type="file" name="imgprod" accept="image/*">
                        <input type="hidden" name="img" value="'.$prods->IMG.'" >
                        </td>';
                    echo '<td> <button type="submit" name="bttnEdit" value="BttnAct">Editar</button><br><button onclick="Delete('.$prods->IdProd.')">Eliminar</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
            </tbody>
        </table>
        </div>
        </div>    
    </div>
</div>