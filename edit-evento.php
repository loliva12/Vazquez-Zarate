<!-- Comienza código: edit.php -->
<?PHP

include("./ludb.php");

if(isset($_GET['id_evento'])) {
    $id_evento = $_GET['id_evento'];
    $query = "SELECT * FROM eventos
                WHERE id_evento = $id_evento";
    $result = mysqli_query($DB_conn, $query);
    if(mysqli_num_rows($result) == 1) {
        $register = mysqli_fetch_array($result);
        $nombre = $register['nombre'];
        $horario = $register['horario'];
        $fecha = $register['fecha'];
        $referencia = $register['referencia'];
        $nombre_abogado = $register['nombre_abogado'];
    }
}

?>

<?php include ("./header-evento.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card" card-body>
            <div class="card-header">Editar Evento</div>
                <form action="./update-evento.php" method="POST">
                    <input type="hidden" name="id_evento" value="<?PHP echo $id_evento ?>">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text"  name="nombre" class="form-control" value="<?PHP echo $nombre ?>"  required>
                        </div>
                        <div class="mb-3">
                            <label for="horario">Horario</label>
                            <input type="time" name="horario" class="form-control" value="<?PHP echo $horario ?>"  required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="<?PHP echo $fecha ?>">
                        </div>
                        <div class="mb-3">
                            <label for="referencia">Referencia</label>
                            <input type="text" name="referencia" class="form-control" value="<?PHP echo $referencia ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nombre_abogado">Nombre Abogado</label>
                            <input type="text" name="nombre_abogado" class="form-control" value="<?PHP echo $nombre_abogado ?>">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" name="update" value="Actualizar">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("./footer-evento.php"); ?>