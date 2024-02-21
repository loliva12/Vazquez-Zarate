<!-- Comienza código: edit.php -->
<?PHP

include("./ludb.php");

if(isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    $query = "SELECT * FROM clientes
                WHERE id_cliente = $id_cliente";
    $result = mysqli_query($DB_conn, $query);
    if(mysqli_num_rows($result) == 1) {
        $register = mysqli_fetch_array($result);
        $nombre = $register['nombre'];
        $apellido = $register['apellido'];
        $fecha_nacimiento = $register['fecha_nacimiento'];
        $telefono = $register['telefono'];
        $email = $register['email'];
        $redes = $register['redes'];
        $direccion = $register['direccion'];
    }
}

?>

<?php include ("./header-cliente.php"); ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background-color: #ebb48d;">
                <div class="card-header" style="background-color: #ebb48d; color: #a3531c;">
                    <h4 class="mb-0">Editar Cliente</h4>
                </div>
                <div class="card-body" style="background-color: #ffff;">
                    <form action="./update-cliente.php" method="POST">
                        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>" placeholder="Escriba el nombre" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $apellido ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $fecha_nacimiento ?>">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" class="form-control" value="<?php echo $telefono ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <label for="redes">Redes Sociales:</label>
                            <input type="text" name="redes" class="form-control" value="<?php echo $redes ?>">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" class="form-control" value="<?php echo $direccion ?>">
                        </div>

                        <br>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success" style="background-color: #ebb48d; border-color: #ebb48d; color: #a3531c;" name="update">Actualizar</button>
                            <a href="./crud-cliente.php" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545;">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ("./footer-cliente.php"); ?>