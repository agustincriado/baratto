<?php 

require ('./connect.php'); 

function read() {
    global $connection;

    $query = "SELECT * FROM inventario";

    $result = $connection->query($query);

    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return json_encode($row);
}
    
if (isset($_GET['ShowAll'])) {
    echo read();
}

function create(array $data) {
    global $connection;
    $values = implode(", ", $data);
    $query = "INSERT INTO inventario (nombre, cantidad, coste_de_compra, coste_de_venta) VALUES ('".$_POST['nombre']."', ".$values.")";
    mysqli_query($connection, $query, MYSQLI_STORE_RESULT);
}


if(isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['coste_de_venta']) && isset($_POST['coste_de_compra'])) {
    $vals = array($_POST['cantidad'], $_POST['coste_de_venta'], $_POST['coste_de_compra']);
    create($vals);
}

function update($firstvar, $secondvar) {
    global $connection;
    foreach($firstvar as $key => $value) {
        if ($value !== ''){
            $values[] = $key . " = '" . $value . "'";
        }
    };
    $queryValues = implode(',', $values);
    $query = "UPDATE inventario SET ".$queryValues." WHERE nombre='".$secondvar."';";
    echo $query;
    if($connection->query($query) === TRUE) {
        echo "Update succesfully";
    } else {echo "Error on update";}
}

if(isset($_POST['update']) && $_POST['update'] !== "") {
    $vals = array(
        'nombre' => $_POST['nombre'],
        'cantidad' => $_POST['cantidad'],
        'coste_de_venta' => $_POST['coste_de_venta'],
        'coste_de_compra' => $_POST['coste_de_compra']
    );

    update($vals, $_POST['update']);
}
function delete($value) {
    global $connection;
    $query = "DELETE FROM inventario WHERE nombre='".$value."';";
    echo $query;
    if($connection->query($query) === TRUE) {
        echo "Delete succesfully";
    } else {echo "Error on delete";}

}

if(isset($_POST['delete']) && $_POST['delete'] !== "") {
    delete($_POST['nombre']);
}
?>