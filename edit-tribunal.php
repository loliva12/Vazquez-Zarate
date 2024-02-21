<!-- Comienza código: edit.php -->
<?php
include("./ludb.php");

// Verifica si se ha proporcionado el parámetro id_tribunal
if(isset($_GET['id_tribunal'])) {
    $id_tribunal = $_GET['id_tribunal'];

    // Consulta para obtener los detalles del tribunal
    $query = "SELECT * FROM tribunales WHERE id_tribunal = $id_tribunal";
    $result = mysqli_query($DB_conn, $query);

    // Verifica si se encontró un registro
    if(mysqli_num_rows($result) == 1) {
        $register = mysqli_fetch_array($result);
        $nombre = $register['nombre'];
        $direccion = $register['direccion'];
        $telefono = $register['telefono'];
        $email = $register['email'];
        $otros = $register['otros'];
    }
}
?>

<?php include("./header-tribunal.php"); ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background-color: #ebb48d;">
                <div class="card-header" style="background-color: #ebb48d; color: #a3531c;">
                    <h4 class="mb-0">Editar Tribunal</h4>
                </div>
                <div class="card-body" style="background-color: #ffff;">
                    <form action="./update-tribunal.php" method="POST">
                        <input type="hidden" name="id_tribunal" value="<?php echo $id_tribunal ?>">

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>" placeholder="Escriba el nombre" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" class="form-control" value="<?php echo $direccion ?>">
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
                            <label for="otros">Otros:</label>
                            <input type="text" name="otros" class="form-control" value="<?php echo $otros ?>">
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success" style="background-color: #ebb48d; border-color: #ebb48d; color: #a3531c;" name="update">Actualizar</button>
                            <a href="./crud-tribunal.php" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545;">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>