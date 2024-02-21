<!-- Comienza código: read.php -->
<form method="post" action="">
    <div class="mb-3">
        <label for="filtro_tipo">Filtrar por Tipo de Causa</label>
        <select name="filtro_tipo" id="filtro_tipo" class="form-control">
            <option value="">Todos los Tipos</option>
            <?php
            // Obtener los tipos de la base de datos
            $query_tipos = "SELECT DISTINCT tipo_causa FROM causas";
            $result_tipos = mysqli_query($DB_conn, $query_tipos);

            while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
                $selected = (isset($_POST['filtro_tipo']) && $_POST['filtro_tipo'] == $row_tipo['tipo_causa']) ? 'selected' : '';
                echo '<option value="' . $row_tipo['tipo_causa'] . '" ' . $selected . '>' . $row_tipo['tipo_causa'] . '</option>';
            }
            ?>
        </select>
    </div>

    <input type="submit" class="btn btn-primary" name="filtrar_tipo" value="Filtrar por Tipo">
</form>

<?php
if (isset($_POST['filtrar_tipo'])) {
    $filtro_tipo = mysqli_real_escape_string($DB_conn, $_POST['filtro_tipo']);
    $query = "SELECT c.*, cl.nombre AS nom_cliente
              FROM causas c
              INNER JOIN clientes cl ON c.id_cliente = cl.id_cliente
              WHERE c.tipo_causa = '$filtro_tipo'";
} else {
    // Consulta sin filtro de tipo
    $query = "SELECT c.*, cl.nombre AS nom_cliente
              FROM causas c
              INNER JOIN clientes cl ON c.id_cliente = cl.id_cliente";
}

$result = mysqli_query($DB_conn, $query);
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cliente</th>
            <th>Tipo Causa</th>
            <th>Sub-Tipo Causa</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($register = mysqli_fetch_assoc($result)) { 
        ?>
            <tr onclick="document.location = './edit-causa.php?id_causa=<?php echo $register['id_causa']; ?>'">
                
                <td><?php echo $register['nombre']; ?></td>
                <td><?php echo $register['descripcion']; ?></td>
                <td><?php echo $register['nom_cliente']; ?></td>
                <td><?php echo $register['tipo_causa']; ?></td>
                <td><?php echo $register['subtipo_causa']; ?></td>
                <td>
                    <a href="./edit-causa.php?id_causa=<?php echo $register['id_causa']; ?>" class="btn btn-success" title="Editar el registro <?php echo $register['id_causa']; ?>">
                        <!-- icono para editar -->
                        <i class="fas fa-user-edit"></i>
                    </a>
                    <a href="./delete-causa.php?id_causa=<?php echo $register['id_causa']; ?>" class="btn btn-danger" title="Borrar el registro <?php echo $register['id_causa']; ?>">
                        <!-- icono para eliminar -->
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
