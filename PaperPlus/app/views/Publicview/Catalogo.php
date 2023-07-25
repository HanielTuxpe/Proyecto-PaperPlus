<link rel="stylesheet" href="app/CSS/CatalogoNews.css">
<div class="produc">
    <div class="Filtrar">
        <div class="buscar">
            <label for="categoria">Filtrar por categoría:</label>
        </div>
        <div class="fil">
            <form id="filtro">
                <select name="categoria" id="categoria">
                    <option value="0">Todas las categorías: </option> <br>
                    <?php while($cat = $consultaC->fetch_assoc()) { ?>
                        <option value="<?php echo $cat['IdCategoria']; ?>"><?php echo $cat['Nombre']; ?></option>
                    <?php } ?>
                </select>
            <div class="B-btn">
            <button type="submit" value="Filtrar">Filtrar</button>
            </div>
            </form>
        </div>
        <script src="app/JS/Filtro.js"></script>
    </div>
    <script src="app/JS/Catalogo.js"></script>
    <div class="catalogo">
        <?php
            while($prods = $consulta->fetch_assoc()) {
            echo '<div class="contenedor" id="contenedor">
            <div class="Produ">
            <img src="app/SRC/prodimg/'.$prods['IMG'].'" alt="Imagen del producto">

            <div class="info">
                <p type="hidden" value ="'.$prods['Categoria'].'">'.$prods['Nombre'].'</p>
                <p class="Precio">Precio: $'.$prods['PrecioVenta'].'</samp></p>
            </div>
            <div class="dd">
                <button class="dd-btn">Ver Detalles</button>
                <div class="dd-content">
                    <p>Caracteristicas: '.$prods['Descripción'].'</p>
                    <p>Cantidad Disponible:'.$prods['Stock'].'</p>
                    <p>Marca: '.$prods['Marca'].'</p>
                    <p>Categoria: '.$prods['Categoria'].'</p>
                    <input type="button" value="Comprar">
                </div>
            </div>
            </div>
            </div>';
            }
        ?>
    </div>
</div>