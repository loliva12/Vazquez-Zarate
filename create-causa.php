<!-- Comienza código: create.php -->
<?php
require_once("./ludb.php");
$query_clientes = "SELECT id_cliente, nombre FROM clientes";
$result_clientes = mysqli_query($DB_conn, $query_clientes);
?>

<?php
//session_start();

if (isset($message)) { ?>
    <div class="alert alert-<?php echo $message_type ?> alert-dismissible fade show" role="alert">
        <p><?php echo $message; ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    session_unset();
}
?>

<div class="card card-body">
    <div class="card-header" style="background-color: #ebb48d; padding: 10px; font-weight: bold; text-align: center; font-size: 24px; color: #824216">
        Crear Causa
    </div>
    <form action="./insert-causa.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese nombre" autofocus required>
            </div>
        
            <div class="mb-3">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Ingrese descripción" autofocus required>
            </div>

            <div class="mb-3">
                <label for="id_cliente">Clientes</label>
                <select name="id_cliente" class="form-control">
                    <option value="" selected disabled>Elige un cliente</option>
                    <?php
                    while ($row_cliente = mysqli_fetch_assoc($result_clientes)) {
                        echo '<option value="' . $row_cliente['id_cliente'] . '">' . $row_cliente['nombre'] . '</option>';
                    }
                    ?>
                </select>
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
                    <option value="" selected disabled>Elige un subtipo de causa</option>
                    <!-- Opciones de subtipos se agregarán dinámicamente mediante JavaScript -->
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
        <input type="submit" class="btn btn-success" name="create" value="Crear">
    </form>
</div>

<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Evento de cambio en el desplegable de tipos
        $("#tipo_causa").change(function () {
            // Obtener el valor seleccionado
            var tipoSeleccionado = $(this).val();

            // Llamar a una función para cargar los subtipos
            cargarSubtipos(tipoSeleccionado);
        });

        // Función para cargar los subtipos
        function cargarSubtipos(tipo) {
            var subtipos = [];

            // Limpia el desplegable de subtipos
            $("#subtipo_causa").empty();

           
            if (tipo === "Penal") {
                subtipos = ["Defenas", "Querellantes"];
            } else if (tipo === "Administrativo") {
                subtipos = ["Policia", "Fpa", "Poder Judicial", "Estado provincial", "Estado nacional", "Servicio penitenciario","Otras"];
            }else if (tipo === "Violencia familiar") {
                subtipos = ["Denunciado", "Denunciante"];
            }else if (tipo === "Civil") {
                subtipos = ["Sucesiones", "Familia", "Divorcios", "Daño", "Reales", "Contratos", "Amparos", "Cauterales", "Otras"];
            }else if (tipo === "Laboral") {
                subtipos = ["Actor", "Demandado"];
            }else if (tipo === "Otras") {
                subtipos = ["Actor", "Demanda"];
            }
            // Agrega las opciones al desplegable de subtipos
            $.each(subtipos, function (index, value) {
                $("#subtipo_causa").append('<option value="' + value + '">' + value + '</option>');
            });
        }
    });
</script>
