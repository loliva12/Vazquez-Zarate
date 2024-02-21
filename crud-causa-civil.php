
<?php
// Obtener el valor de $rol de los parámetros de consulta
if (isset($_GET['rol'])) {
    $rol = $_GET['rol'];
} else {
    // Manejar el caso en que $rol no esté definido en los parámetros de consulta
    $rol = "Valor predeterminado";
}
?>


<?php include ("./header-causa.php"); ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<main>
    <div class="container p-4">
        <div class="row">
            <div class="col">
                <button id="btnAgregarNuevo" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Agregar Nuevo Causa
                </button>
                <div id="createClienteForm" style="display: none;">
                    <?php include ("./create-causa.php"); ?>
                </div>
            </div>
            <br>
            <br>
            <div class="col-12" id="readClienteSection">
                <?php include ("./read-causa-civil.php"); ?>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $("#btnAgregarNuevo").click(function() {
            $("#createClienteForm").toggle();
            $("#readClienteSection").toggle();
        });
    });
</script>

<?php include ("./footer-causa.php"); ?>