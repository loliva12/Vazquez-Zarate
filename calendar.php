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
  <title>Calendario con Eventos y Almacenamiento Local</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f7f7f7;
    }

    #calendar {
      display: inline-block;
      font-size: 1.2em;
      margin: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 20px;
    }

    #year-month {
      margin-bottom: 10px;
    }

    #year, #month {
      font-size: 1.5em;
    }

    table {
      border-collapse: collapse;
      margin: 20px auto;
      width: 90%;
    }

    th, td {
      padding: 15px;
      border: 1px solid #ddd;
      position: relative;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    .event-container {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 4px;
      font-size: 0.7em;
      text-align: left;
    }

    .normal { background-color: #FFD700; color: #333; } /* Amarillo para eventos normales */
    .intermedio { background-color: #FFA500; color: #333; } /* Naranja para eventos intermedios */
    .grave { background-color: #FF6347; color: #fff; } /* Rojo para eventos graves */
    .sin-evento { background-color: #7FFF7F; color: #333; } /* Verde claro para días sin eventos */

    button {
      font-size: 1em;
      margin: 10px;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button#prevYear {
      background-color: #a3531c;
      color: #ffff;
    }

    button#prevMonth {
      background-color: #824216;
      color: #ffff;
    }

    button#nextMonth {
      background-color: #824216;
      color: #ffff;
    }

    button#nextYear {
      background-color: #a3531c;
      color: #ffff;
    }

    button:hover {
      filter: brightness(90%);
    }

    .action-buttons {
      margin-top: 20px;
    }

    button#addEvent, button#goToHome, button#viewEvents {
      background-color: #ebb48d;
      color: #693614;
    }
  </style>
</head>
<body>

<div id="calendar">
  <div id="year-month">
    <span id="year"></span> <span id="month"></span>
  </div>
  <button id="prevYear" onclick="prevYear()">◄ Año Anterior</button>
  <button id="prevMonth" onclick="prevMonth()">◄ Mes Anterior</button>
  <button id="nextMonth" onclick="nextMonth()">Mes Siguiente ►</button>
  <button id="nextYear" onclick="nextYear()">Año Siguiente ►</button>
  <table id="calendarTable"></table>
  <div class="action-buttons">
    <button id="addEvent" onclick="addEvent()">Agregar Evento</button>
    <button id="viewEvents" onclick="viewEvents()">Ver Eventos</button>
  </div>
</div>

<div id="eventInfo" style="display: none;">
  <h2>Información del Evento</h2>
  <table id="eventInfoTable">
    <thead>
      <tr>
        <th>Título</th>
        <th>Horario</th>
        <th>Referencias</th>
        <th>Nombre de Abogado</th>
      </tr>
    </thead>
    <tbody id="eventInfoBody">
      <!-- Aquí se llenará la tabla con la información de los eventos -->
    </tbody>
  </table>
</div>


<script>
  let currentDate = new Date();
  let currentYear = currentDate.getFullYear();
  let currentMonth = currentDate.getMonth();
  let events = getEventsFromLocalStorage() || [];

  function renderCalendar(year, month) {
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const daysInMonth = lastDay.getDate();

    document.getElementById('year').innerText = year;
    document.getElementById('month').innerText = new Date(year, month).toLocaleString('es-ES', { month: 'long' }).charAt(0).toUpperCase() + new Date(year, month).toLocaleString('es-ES', { month: 'long' }).slice(1);

    const dayNames = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];

    let calendarTable = '<tr>';
    for (const dayName of dayNames) {
      calendarTable += `<th>${dayName}</th>`;
    }
    calendarTable += '</tr><tr>';

    for (let i = 0; i < firstDay.getDay(); i++) {
      calendarTable += '<td></td>';
    }

    for (let day = 1; day <= daysInMonth; day++) {
      const dayEvents = events.filter(event => event.day === day && event.month === month + 1 && event.year === year);
      const eventImportance = getEventImportance(dayEvents);

      calendarTable += `<td class="${eventImportance}">${day}<div class="event-container" id="day-${day}-${month + 1}-${year}"></div></td>`;

      if ((firstDay.getDay() + day) % 7 === 0) {
        calendarTable += '</tr><tr>';
      }
    }

    calendarTable += '</tr>';

    document.getElementById('calendarTable').innerHTML = calendarTable;
    displayEvents();
  }

  function displayEvents() {
    events.forEach(event => {
      const eventContainer = document.getElementById(`day-${event.day}-${event.month}-${event.year}`);
      if (eventContainer) {
        const eventDiv = document.createElement('div');
        eventDiv.className = `event ${getEventImportance([event])}`;
        eventDiv.innerText = event.title;
        eventContainer.appendChild(eventDiv);
      }
    });
  }

  function getEventImportance(dayEvents) {
    if (dayEvents.length === 0) {
      return 'sin-evento'; // Sin eventos
    } else if (dayEvents.some(event => event.importance === 'normal')) {
      return 'normal'; // Al menos un evento normal
    } else if (dayEvents.some(event => event.importance === 'grave')) {
      return 'grave'; // Al menos un evento grave
    } else {
      return 'intermedio'; // Otros casos
    }
  }

  function addEvent() {
    const eventTitle = prompt('Ingrese el título del evento:');
    if (eventTitle) {
      const eventDay = prompt('Ingrese el día:');
      const eventMonth = currentMonth + 1;
      const eventYear = currentYear;
      const eventImportance = prompt('Ingrese la importancia del evento (normal, intermedio, grave):');
      const eventTime = prompt('Ingrese el horario:');
      const eventReferences = prompt('Ingrese las referencias:');
      const eventLawyerName = prompt('Ingrese el nombre del abogado:');

      events.push({
        title: eventTitle,
        day: parseInt(eventDay),
        month: eventMonth,
        year: eventYear,
        importance: eventImportance,
        time: eventTime,
        references: eventReferences,
        lawyerName: eventLawyerName
      });

      saveEventsToLocalStorage(events);
      renderCalendar(currentYear, currentMonth);
    }
  }



  function viewEvents() {
    const rol = "<?php echo $rol; ?>";
    window.location.href = 'eventos.php?rol=' + encodeURIComponent(rol);
}

  function prevYear() {
    currentYear--;
    renderCalendar(currentYear, currentMonth);
  }

  function nextYear() {
    currentYear++;
    renderCalendar(currentYear, currentMonth);
  }

  function prevMonth() {
    if (currentMonth === 0) {
      currentYear--;
      currentMonth = 11;
    } else {
      currentMonth--;
    }
    renderCalendar(currentYear, currentMonth);
  }

  function nextMonth() {
    if (currentMonth === 11) {
      currentYear++;
      currentMonth = 0;
    } else {
      currentMonth++;
    }
    renderCalendar(currentYear, currentMonth);
  }

  function getEventsFromLocalStorage() {
    const storedEvents = localStorage.getItem('events');
    return storedEvents ? JSON.parse(storedEvents) : null;
  }

  function saveEventsToLocalStorage(events) {
    localStorage.setItem('events', JSON.stringify(events));
  }

  // Rendering inicial
  renderCalendar(currentYear, currentMonth);
</script>

</body>
<footer>
  <div class="py-4 bg-light mt-auto">
      <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
              <button type="button" class="btn btn-dark" onclick="location.href='./home.php?rol=<?= urlencode($rol) ?>'">
                  <i class="fa fa-home"></i>
                  <span>Inicio</span>
              </button>
          </div>
      </div>
  </div>
</footer>
</html>
