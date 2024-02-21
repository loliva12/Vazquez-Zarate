<?php
include("./ludb.php");

if (isset($_GET['id_causa'])) {
    $id_causa = $_GET['id_causa'];
    $query = "SELECT * FROM causas
                WHERE id_causa = $id_causa";
    $result = mysqli_query($DB_conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $register = mysqli_fetch_array($result);
        $nombre = $register['nombre'];
        $descripcion = $register['descripcion'];
        $id_cliente = $register['id_cliente'];
        $tipo_causa = $register['tipo_causa'];
        $subtipo_causa = $register['subtipo_causa'];
        $estado = $register['estado'];
    }
}

$query_tipos = "SELECT DISTINCT tipo_causa FROM causas";
$result_tipos = mysqli_query($DB_conn, $query_tipos);
?>

<?php include("./header-causa.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card" style="background-color: #ebb48d;">
                <div class="card-header" style="background-color: #ebb48d; color: #a3531c;">
                    <h4 class="mb-0">Editar Causa</h4>
                </div>
                <div class="card-body" style="background-color: #ffff;">
                    <form action="./update-causa.php" method="POST">
                        <input type="hidden" name="id_causa" value="<?php echo $id_causa ?>">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>" placeholder="Escriba el nombre" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_cliente">Cliente</label>
                                <input type="text" name="id_cliente" class="form-control" value="<?php echo $id_cliente ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_causa">Tipo de Causa</label>
                                <select name="tipo_causa" id="tipo_causa" class="form-control">
                                    <option value="" selected disabled>Elige un tipo de causa</option>
                                    <option value="Penal">Penal</option>
                                    <option value="Administrativo">Administrativo</option>
                                    <option value="Violencia familiar">Violencia familiar</option>
                                    <option value="Civil">Civil</option>
                                    <option value="Laboral">Laboral</option>
                                    <option value="Otras">Otras</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subtipo_causa">Subtipo de Causa</label>
                                <select name="subtipo_causa" id="subtipo_causa" class="form-control">
                                    <!-- Las opciones de subtipos se cargarán dinámicamente mediante JavaScript -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="" selected disabled>Elige un estado</option>
                                    <option value="estado 1">Estado 1</option>
                                    <option value="estado 2">Estado 2</option>
                                    <option value="estado 3">Estado 3</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" name="update" value="Actualizar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Obtén el tipo de causa seleccionado al cargar la página
        var tipoSeleccionado = $("#tipo_causa").val();

        // Carga los subtipos iniciales al cargar la página
        cargarSubtipos(tipoSeleccionado);

        // Evento de cambio en el desplegable de tipos
        $("#tipo_causa").change(function () {
            // Obtener el nuevo valor seleccionado
            var nuevoTipoSeleccionado = $(this).val();

            // Llamar a una función para cargar los subtipos
            cargarSubtipos(nuevoTipoSeleccionado);
        });

        // Función para cargar los subtipos
        function cargarSubtipos(tipo) {
            var subtipos = [];
            $("#subtipo_causa").empty();

            if (tipo === "Penal") {
                subtipos = ["Defenas", "querellantes"];
            } else if (tipo === "Administrativo") {
                subtipos = ["Policia", "Fpa", "Poder Judicial", "Estado provincial", "Estado nacional", "Servicio penitenciario","Otras"];
            } else if (tipo === "Violencia familiar") {
                subtipos = ["Denunciado", "Denunciante"];
            } else if (tipo === "Civil") {
                subtipos = ["Sucesiones", "Familia", "Divorcios", "Daño", "Reales", "Contratos", "Amparos", "Cauterales", "Otras"];
            } else if (tipo === "Laboral") {
                subtipos = ["Actor", "Demandado"];
            } else if (tipo === "Otras") {
                subtipos = ["Actor", "Demanda"];
            }

            $.each(subtipos, function (index, value) {
                var selected = (value === "<?php echo $subtipo_causa; ?>") ? 'selected' : '';
                $("#subtipo_causa").append('<option value="' + value + '" ' + selected + '>' + value + '</option>');
            });
        }
    });
</script>
