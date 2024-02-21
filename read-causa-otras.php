<!-- Comienza código: read.php -->
<form method="post" action="">
    <div class="mb-3">
        <label for="filtro_estado">Filtrar por Estado</label>
        <select name="filtro_estado" id="filtro_estado" class="form-control">
            <option value="">Todos los Estados</option>
            <option value="estado 1">Estado 1</option>
            <option value="estado 2">Estado 2</option>
            <option value="estado 3">Estado 3</option>
        </select>
    </div>

    <input type="submit" class="btn btn-dark" name="filtrar_estado" value="Filtrar por Estado">
    <br>
</form>

<?php
require_once("./ludb.php");

if (isset($_POST['filtrar_estado'])) {
    $filtro_estado = mysqli_real_escape_string($DB_conn, $_POST['filtro_estado']);
    $query = "SELECT c.*, cl.nombre AS nom_cliente
              FROM causas c
              INNER JOIN clientes cl ON c.id_cliente = cl.id_cliente
              WHERE c.estado = '$filtro_estado'";
} else {
    // Consulta sin filtro de estado
    $query = "SELECT c.*, cl.nombre AS nom_cliente
    FROM causas c
    INNER JOIN clientes cl ON c.id_cliente = cl.id_cliente
    WHERE c.tipo_causa = 'Otras'";
}

$result = mysqli_query($DB_conn, $query);
?>
<br>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cliente</th>
            <th>Tipo Causa</th>
            <th>Sub-Tipo Causa</th>
            <th>Estado</th>
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
                <td><?php echo $register['estado']; ?></td>
                <td>
                <a href="./edit-causa.php?id_causa=<?php echo $register['id_causa']; ?>&rol=<?php echo $rol; ?>" class="btn btn-success" title="Editar el registro <?php echo $register['id_causa']; ?>">
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

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #ffff;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #a3531c;
    }

    th {
        background-color: #ebb48d;
        color: #a3531c;
    }

    tr:hover {
        background-color: #f6ebdd; /* Cambiar color al pasar el mouse sobre la fila */
    }
</style>
