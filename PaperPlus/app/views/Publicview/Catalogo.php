<link rel="stylesheet" href="app/CSS/CatalogoFilt.css">
<div class="produc">
    <div class="Filtrar">
        <div class="buscar">
            <label for="categoria">Filtrar por categoría:</label>
        </div>
        <div class="fil">
            <form id="filtro">
                <select name="categoria" id="categoria">
                    <option value="0">Todas las categorías</option>
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
<div>
    <h2 id="Title"></h2>
</div>
<script src="app/JS/Catalogo.js"></script>
    <?php
        while($prods = $consulta->fetch_assoc()) {
    echo '<div class="contenedor" id="contenedor">
        <div class="Produ">
            <img src="app/SRC/prodimg/'.$prods['IMG'].'" alt="Imagen del producto">
            <div class="info">
                <p type="hidden" value ="'.$prods['Categoria'].'">'.$prods['Nombre'].'</p><br>
                <p class="Precio">Precio: $'.$prods['PrecioVenta'].'</p><br>
                <p>Caracteristcas: <span>'.$prods['Descripción'].'</span></p><br>
                <p>Cantidad Disponible:'.$prods['Stock'].'</p><br>
                <p>Marca: '.$prods['Marca'].'</p><br>
                <p>Categoria: '.$prods['Categoria'].'</p><br>
                <input type="button" value="Comprar">
            </div>
            </div>
        </div>';
        }
    ?>
</div>