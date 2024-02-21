<!-- Comienza código: read.php -->
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
        background-color: #ebb48d; /* Cambiar color de fondo */
        color: #a3531c;
    }

    tr:hover {
        background-color: #f6ebdd; /* Cambiar color al pasar el mouse sobre la fila */
    }
</style>

<table >
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Horario</th>
            <th>Nombre</th>
            <th>Referencias</th>
            <th>Nombre Abogado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM eventos ORDER BY fecha, horario";
        $result = mysqli_query($DB_conn, $query);

        while($register = mysqli_fetch_array($result)) { ?>
            <tr onclick="document.location = './edit-evento.php?id_evento=<?php echo $register['id_evento']; ?>'">
                <td><?php echo $register['fecha']; ?></td>
                <td><?php echo $register['horario']; ?></td>
                <td><?php echo $register['nombre']; ?></td>
                <td><?php echo $register['referencia']; ?></td>
                <td><?php echo $register['nombre_abogado']; ?></td>
                <td>
                    <a href="./edit-evento.php?id_evento=<?php echo $register['id_evento']; ?>" class="btn btn-success" title="Editar el registro <?php echo $register['id_evento']; ?>">
                        <!-- icono para editar -->
                        <i class="fas fa-user-edit"></i>
                    </a>
                    <a href="./delete-evento.php?id_evento=<?php echo $register['id_evento']; ?>" class="btn btn-danger" title="Borrar el registro <?php echo $register['id_evento']; ?>">
                        <!-- icono para eliminar -->
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
