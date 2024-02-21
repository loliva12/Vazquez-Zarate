<?php
// Obtener el valor de $rol de los parámetros de consulta
if (isset($_GET['rol'])) {
    $rol = $_GET['rol'];
} else {
    // Manejar el caso en que $rol no esté definido en los parámetros de consulta
    $rol = "Valor predeterminado";
}
?>

<?php include ("./header-tribunal.php"); ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<main>
    <div class="container p-4">
        <div class="row">
            <div class="col">
                <button id="btnAgregarNuevo" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Agregar Nuevo Tribunal
                </button>
                <div id="createTribunalForm" style="display: none;">
                    <?php include ("./create-tribunal.php"); ?>
                </div>
            </div>
            <br>
            <br>
            <div class="col-12" id="readTribunalSection">
                <?php include ("./read-tribunal.php"); ?>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $("#btnAgregarNuevo").click(function() {
            $("#createTribunalForm").toggle();
            $("#readTribunalSection").toggle();
        });
    });
</script>

<?php include ("./footer-tribunal.php"); ?>
