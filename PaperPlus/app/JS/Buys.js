function setFechaActual() {
    var campoFecha = document.getElementById('Date');
    var fechaActual = new Date().toISOString().split('T')[0];
    campoFecha.value = fechaActual;
}
setFechaActual();

function addDetBuys() {
    var selectElement = document.getElementById('ProdsV');
    var selectedIndex = selectElement.selectedIndex;
    var selectedOption = selectElement.options[selectedIndex];
    var prod = selectedOption.getAttribute('data-provider');
    var prodValue = selectElement.value;
    console.log(prodValue);
  
    var tableD = document.getElementById('Details').getElementsByTagName('tbody')[0];
    var newRow = tableD.insertRow();
  
    var Prods = newRow.insertCell();
    var Stock = newRow.insertCell();
    var Prv = newRow.insertCell();
    var Subt = newRow.insertCell();
  
    Prods.innerHTML = '<td><input type="hidden" name="ProdId" id="IdProd" value="' + prodValue + '"><input type="text" name="Prod" value="' + prod + '" readonly></td>';
    Stock.innerHTML = '<td><input type="number" id="stocks" class="stocks" name="stock"></td>';
    Prv.innerHTML = '<td><input type="number" id="precio" class="precio" name="PrecioP"></td>';
    Subt.innerHTML = '<td><input id="calc" class="calc" type="text" name="Subtotal" readonly></td>';
  }
  
  function getTableRows() {
    var table = document.getElementById('Details');
    var numRows = table.rows.length;
    console.log('Cantidad de filas en la tabla:', numRows);
    return numRows;
  }

  function calSubTo() {
    var Total = 0;
    var tableD = document.getElementById('Details').getElementsByTagName('tbody')[0];
    var rows = tableD.getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var cantidad = parseFloat(rows[i].querySelector('.stocks').value);
        var precio = parseFloat(rows[i].querySelector('.precio').value);
        var subtotal = cantidad * precio;
        rows[i].querySelector('.calc').value = subtotal.toFixed(2);
    }
    for (var i = 0; i < rows.length; i++) {
        var subtotal = parseFloat(rows[i].querySelector('.calc').value);
        Total += subtotal;
    }
    document.getElementById('Total').value = Total.toFixed(2);
  }
  
  function exe(){
    getTableRows();
    sendData();
  }

  function sendData() {
    var form = document.getElementById('form');
  
    var table = document.getElementById('Details');
    var numRows = table.rows.length;
  
    var numFilasInput = document.createElement('input');
    numFilasInput.type = 'hidden';
    numFilasInput.name = 'numFilas';
    numFilasInput.value = numRows;
    form.appendChild(numFilasInput);
    }


    function sendData()
    {
        var form = document.getElementById('form');
        var table = document.getElementById('Details');
        var numRows = table.rows.length;
      
        var numFilasInput = document.createElement('input');
        numFilasInput.type = 'hidden';
        numFilasInput.name = 'numFilas';
        numFilasInput.value = numRows;
        form.appendChild(numFilasInput);
      
        for (var i = 0; i < numRows; i++) {
          var row = table.rows[i];
          var prodId = row.querySelector('[name="ProdId"]').value;
          var stock = row.querySelector('[name="stock"]').value;
          var precio = row.querySelector('[name="PrecioP"]').value;
          var subtotal = row.querySelector('[name="Subtotal"]').value;

          console.log(prodId, stock, precio, subtotal);
      
          if (prodId && stock && precio && subtotal) {
            var prodIdValue = prodId.value;
            var stockValue = stock.value;
            var precioValue = precio.value;
            var subtotalValue = subtotal.value;
      
            var prodIdInput = document.createElement('input');
            prodIdInput.type = 'hidden';
            prodIdInput.name = 'ProdId[]';
            prodIdInput.value = prodIdValue;
            form.appendChild(prodIdInput);
      
            var stockInput = document.createElement('input');
            stockInput.type = 'hidden';
            stockInput.name = 'stock[]';
            stockInput.value = stockValue;
            form.appendChild(stockInput);
      
            var precioInput = document.createElement('input');
            precioInput.type = 'hidden';
            precioInput.name = 'PrecioP[]';
            precioInput.value = precioValue;
            form.appendChild(precioInput);
      
            var subtotalInput = document.createElement('input');
            subtotalInput.type = 'hidden';
            subtotalInput.name = 'Subtotal[]';
            subtotalInput.value = subtotalValue;
            form.appendChild(subtotalInput);
          }
        }
      
        form.submit();
        console.log(form.submit());
    }