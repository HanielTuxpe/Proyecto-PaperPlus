<link rel="stylesheet" href="app/CSS/BuysNew.css">
<div class="contenidoft">
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
          <button class="RegistroUser" type="button" onclick="addDetBuys()" value="Añadir">Añadir</button>
      </form>
    </div>
    <div class="tabla-compra">
      <form action="/PaperPlus/?C=Buys_Controller&M=RegNewBuy" method="post" id="form">
      <div class="datos-com">
        <div class="Pr-datos">
          <div class="Pr">
            <h4>Proveedor</h4>
            <label>Selecciona Proveedor: </label>
            <select name="Fabs" id="FabsV" class="control">
            <?php foreach($consultaF as $rowsc){ ?>
              <option value="<?php echo $rowsc->IdProv; ?>"><?php echo $rowsc->Nombre; ?></option>
            <?php } ?>
            </select><br>
          </div>
          <div class="Pr2">
            <h4>Fecha de compra</h4>
              <input type="date" name="DtBuy" id="Date" readonly>
          </div>
        </div>
      </div>
      <div class="lista-Compras">
        <h4>Detalles de Compra</h4>
      </div>
      <div class="Tablas-compra">
        <div class="scroll">
          <div class="content-tabla">
            <table class="centered-table" id="Details">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody id="Details2">
              </tbody>
            </table>
            <div class="buttons">
              <label for="TotalC">Total de la compra</label>
              <input type="text" name="TotalC" id="Total" readonly>
              <input class="RegistroUser" type="button" onclick="calSubTo(); exe();" value="Calcular totales">
              <input class="RegistroUser" type="submit" onclick="sendData()" value="Añadir compra">
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="app/JS/Buys.js"></script>
<div class="contenidoft2">
  <div class="inventario">
    <h2>Inventario</h2>
  </div>
  <div class="Tablas-compra2">
    <div>
      <div class="content-tabla" style="overflow: scroll; ">
        <table class="centered-table">
          <thead>
            <tr>
              <th>Id Inventario</th>
              <th>Proveedor</th>
              <th>Producto</th>
              <th>Stock</th>
              <th>Fecha de la compra</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($consInv as $prods) {
                echo '<tr>';
                echo '<td><span>'.$prods->IdInventario.'</span></td>';
                echo '<td><span>'.$prods->Proveedor.'</span></td>';
                echo '<td><span>'.$prods->Producto.'</span></td>';
                echo '<td><span>'.$prods->Stock.'</span></td>';
                echo '<td><span>'.$prods->FechaCompra.'</span></td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
        </div>
      </div>
   </div>
</div>