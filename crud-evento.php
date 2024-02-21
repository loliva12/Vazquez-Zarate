
<?php require_once ("./ludb.php"); ?>

<?php include ("./header-evento.php"); ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<main>
    <div class="container p-4">
        <div class="row">
            <div class="col">
               
                <button id="btnCalendario" class="btn btn-secondary">
                    <i class="far fa-calendar-alt"></i> Calendario
                </button>
                
            </div>
            <br>
            <br>
            <div class="col-12" id="readEventoSection">
                <?php include ("./read-evento.php"); ?>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $("#btnAgregarNuevo").click(function() {
            $("#createEventoForm").toggle();
            $("#readEventoSection").toggle();
        });
        // Agregado: Manejar el clic en el botón "Calendario"
        $("#btnCalendario").click(function() {
            // Redirigir a calendario.html
            window.location.href = "./calendar.html";
        });
    });
</script>

<?php include ("./footer-evento.php"); ?>

