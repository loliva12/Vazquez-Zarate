<?php
// Obtener el valor de $rol de los parámetros de consulta
if (isset($_GET['rol'])) {
    $rol = $_GET['rol'];
} else {
    // Manejar el caso en que $rol no esté definido en los parámetros de consulta
    $rol = "Valor predeterminado";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        /* Estilos adicionales para la página eventos.html */
        .header {
            background: linear-gradient(to right, #a3531c, #ebb48d);
            padding: 20px;
            color: white;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            margin: 0;
        }

        .header p {
            font-size: 16px;
            margin: 0;
            margin-top: 10px;
        }
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

    <header class="header">
        <h1>Eventos</h1>
        <p>Gestión de eventos</p>
    </header>

<table>
  <thead>
    <tr>
      <th>Fecha</th>
      <th>Título</th>
      <th>Horario</th>
      <th>Referencias</th>
      <th>Nombre de Abogado</th>
      <th>Importancia</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody id="eventTableBody">
    <!-- Aquí se llenará la tabla con la información de los eventos -->
  </tbody>
</table>

<div class="mt-4">
  <button class="btn btn-dark mr-2" onclick="goToCalendar()">Volver al Calendario</button>
</div>

<script>


  // Obtener eventos del almacenamiento local o alguna fuente de datos
  let events = getEventsFromLocalStorage() || [];

  // Función para mostrar los eventos en la tabla
  function displayEvents() {
    const eventTableBody = document.getElementById('eventTableBody');

    // Limpiar la tabla antes de agregar nuevos eventos
    eventTableBody.innerHTML = '';

    // Iterar sobre cada evento y agregarlo a la tabla
    events.forEach((event, index) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${event.year}-${event.month}-${event.day}</td>
        <td>${event.title}</td>
        <td>${event.time}</td>
        <td>${event.references}</td>
        <td>${event.lawyerName}</td>
        <td>${event.importance}</td> <!-- Columna para mostrar la importancia -->

        <td>
          <button class="btn btn-danger btn-sm" onclick="deleteEvent(${index})">Borrar</button>
          <button class="btn btn-primary btn-sm ml-2" onclick="editEvent(${index})">Editar</button>
        </td>
      `;
      eventTableBody.appendChild(row);
    });
  }

  // Función para obtener eventos del almacenamiento local
  function getEventsFromLocalStorage() {
    const storedEvents = localStorage.getItem('events');
    return storedEvents ? JSON.parse(storedEvents) : null;
  }

  // Mostrar los eventos al cargar la página
  displayEvents();

  // Función para redirigir al calendario
  function goToCalendar() {
    window.location.href = 'calendar.php?rol=<?= urlencode($rol) ?>';
  }

  // Función para borrar un evento específico
  function deleteEvent(index) {
    if (confirm('¿Estás seguro de que deseas borrar este evento?')) {
      events.splice(index, 1); // Eliminar el evento del arreglo
      saveEventsToLocalStorage(events); // Guardar los eventos actualizados en el almacenamiento local
      displayEvents(); // Actualizar la tabla de eventos
    }
  }

  // Función para editar un evento específico
function editEvent(index) {
  // Redirigir a la página de edición con el índice del evento como parámetro en la URL
  window.location.href = 'editar_evento.html?index=' + index + '&rol=<?= urlencode($rol) ?>';
}


  // Función para guardar eventos en el almacenamiento local
  function saveEventsToLocalStorage(events) {
    localStorage.setItem('events', JSON.stringify(events));
  }
</script>

</body>
</html>
