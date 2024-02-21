<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
</head>
<body>

<div class="container mt-4">
    
    <form class="form-inline mb-3">
        <label class="mr-2" for="search">Buscar:</label>
        <input type="text" class="form-control" id="search" oninput="searchClientes()" placeholder="Ingrese el nombre">
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Teléfono</th>
                <th>E-mail</th>
                <th>Redes Sociales</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="resultTableBody">
            <!-- Resultados de la base de datos se mostrarán aquí -->
        </tbody>
    </table>
</div>

<script>
    function searchClientes() {
        var searchTerm = document.getElementById('search').value;

        // Realizar una solicitud AJAX al servidor para obtener los resultados
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Actualizar la tabla con los resultados recibidos del servidor
                document.getElementById('resultTableBody').innerHTML = xhr.responseText;
            }
        };

        // Enviar la solicitud GET al servidor con el término de búsqueda
        xhr.open('GET', './search-cliente.php?search=' + searchTerm, true);
        xhr.send();
    }

    // Función para enviar correo electrónico
    function enviarCorreo(email) {
        window.location.href = 'mailto:' + email;
    }

    // Llamar a la función cuando la página se carga
    window.onload = function() {
        searchClientes();
    }
</script>

</body>
</html>