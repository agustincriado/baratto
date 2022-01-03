<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="buttons">
        <button onclick="showAll()">Show All Products</button>
        <button onclick="toggleForm('create')">Insert a product</button>
        <button onclick="toggleForm('update')">Update a product</button>
        <button onclick="toggleForm('delete')">Delete a product</button>
    </div>
    <iframe name="dummy" class="hidden"></iframe>
    <form action="./db.php" method="post" target="dummy" id="form_create" class="">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="">
        <label for="coste_de_compra">Coste de compra</label>
        <input type="number" step="0.01" name="coste_de_compra" id="">
        <label for="coste_de_venta">Coste de</label>
        <input type="number" step="0.01" name="coste_de_venta" id="">
        <input type="submit" value="Enviar">
    </form>
    <form action="./db.php" method="post" target="dummy" id="form_update">
        <p onclick="toggle('nombre')">Modificar Nombre</p>
        <p onclick="toggle('cantidad')">Modificar Cantidad</p>
        <p onclick="toggle('compra')">Modificar Precio de Compra</p>
        <p onclick="toggle('venta')">Modificar Precio de Venta</p>
        <div id="div_nombre">
            <label for="nombre">Nuevo nombre</label>
            <input type="text" name="nombre" id="">
        </div>
        <div id="div_cantidad">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="">
        </div>
        <div id="div_compra">
            <label for="coste_de_compra">Coste de compra</label>
            <input type="number" step="0.01" name="coste_de_compra" id="">
        </div>
        <div id="div_venta">
            <label for="coste_de_venta">Coste de venta</label>
            <input type="number" step="0.01" name="coste_de_venta" id="">
        </div>
        <label for="nombre">Articulo a cambiar</label>
        <input type="text" name="update" id="">
        <input type="submit" value="Enviar">
    </form>
    <form action="./db.php" method="post" target="dummy" id="form_delete" class="">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="">
        <label for="delete">Escriba para confirmar:</label>
        <input type="text" name="delete" id="">
        <input type="submit" value="Enviar">
    </form>
    <?php 
    ?>
    <div id="root">
    </div>
    <script src="./script.js"></script>
</body>
</html>