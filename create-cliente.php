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
        Crear Cliente
    </div>
    <form action="./insert-cliente.php" method="POST">
        <div class="form-group">
            <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese nombre" autofocus required>
            </div>
        
            <div class="mb-3">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="Ingrese apellido" autofocus required>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Ingrese fecha de nacimiento" autofocus>
            </div>
            <div class="mb-3">
                <label for="telefono">Teléfono</label>
                <input type="number" name="telefono" class="form-control" placeholder="Ingrese teléfono" autofocus>
            </div>
            <div class="mb-3">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Ingrese email" autofocus>
            </div>
            <div class="mb-3">
                <label for="redes">Redes Sociales</label>
                <input type="text" name="redes" class="form-control" placeholder="Ingrese algunas redes sociales de los clientes" autofocus>
            </div>
            <div class="mb-3">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingrese la dirección" autofocus>
            </div>




        </div>
        <input type="submit" class="btn btn-success" name="create" value="Crear">
    </form>
</div>
