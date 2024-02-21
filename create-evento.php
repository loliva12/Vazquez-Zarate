<!-- Comienza código: create.php -->
<?PHP
session_start();
//$message = $_SESSION['message']; 
//$message_type = $_SESSION['message_type']; 
if(isset($message)) { ?>
    <div class="alert alert-<?PHP echo $message_type ?> alert-dismissible fade show" role="alert">
    <p><?PHP echo $message; ?></p>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?PHP 
    session_unset(); 
} ?>

<div class="card card-body">
    <div class="card-header" style="background-color: #ebb48d; padding: 10px; font-weight: bold; text-align: center; font-size: 24px; color: #824216">
        Crear Evento
    </div>
    <form action="./insert-evento.php" method="POST">
        <div class="form-group">
            <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese nombre del evento" autofocus required>
            </div>
            <div class="mb-3">
                <label for="horario">Horario</label>
                <input type="time" name="horario" class="form-control" placeholder="Ingrese horario del evento" autofocus required>
            </div>
            <div class="mb-3">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" class="form-control" placeholder="Ingrese fecha del evento" autofocus>
            </div>
            <div class="mb-3">
                <label for="referencia">Referencia</label>
                <input type="text" name="referencia" class="form-control" placeholder="Ingrese alguna referencia del evento" autofocus>
            </div>
            <div class="mb-3">
                <label for="nombre_abogado">Nombre Abogado</label>
                <input type="text" name="nombre_abogado" class="form-control" placeholder="Ingrese nombre del abogado involucrado" autofocus>
            </div>
        </div>
        <input type="submit" class="btn btn-success" name="create" value="Crear">
    </form>
</div>
