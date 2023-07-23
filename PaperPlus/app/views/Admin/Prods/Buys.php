<link rel="stylesheet" href="app/CSS/BuysStyle.css">
<div class="section">
    <div class="content-RegistroUser">
        <h4>Añadir Compra</h4>
        <div class="Usuario-img">
            <img src="app/img/buys.png" alt="#">
        </div>
        <form>
            <label>Selecciona Productos: </label>
            <select name="Prods" id="ProdsV" class="control">
                <?php foreach($consulta as $rowsc){ ?>
                    <option value="<?php echo $rowsc->IdProd; ?>" data-provider="<?php echo $rowsc->Nombre; ?>"><?php echo $rowsc->Nombre; ?></option>
                <?php } ?>
            </select><br>
            <button class="RegistroUser" type="button" value="Añadir">Añadir</button>
        </form>
    </div>
    <div class="Tablas-Principal">
        <div class="content-tabla" >
        <div class="scroll">
        <table class="centered-table" id="Info">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Fecha de compra</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> 
                        <label>Selecciona Proveedor: </label>
                        <select name="Fabs" id="FabsV" class="control">
                        <?php foreach($consultaF as $rowsc){ ?>
                            <option value="<?php echo $rowsc->IdProv; ?>" data-provider="<?php echo $rowsc->Nombre; ?>"><?php echo $rowsc->Nombre; ?></option>
                            <?php } ?>
                        </select><br>
                    </td>
                    <td><input type="date" name="DtBuy" id="Date" readonly></td>
                </tr>
            </tbody>
        </table>
        <table class="centered-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        </div>
        </div>    
    </div>
</div>
<div class="Tablas-Principal">
        <div class="content-tabla" >
        <h4>Inventario</h4>
        <div class="scroll">
        <table class="centered-table">
            <thead>
                <tr>
                    <th>Id Producto</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Fecha de Compra</th>
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
                    echo '<td> <input type="text" name="txtPV" value="'.$prods->PrecioVenta.'" ></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
            </tbody>
        </table>
        </div>
        </div>    
    </div>
    <script src="app/JS/Buys.js"></script>