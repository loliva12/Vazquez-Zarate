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
    <title>Causas</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

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

        .button-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(40%, 1fr));
            gap: 10px;
            padding: 20px;
            text-align: center;
            justify-content: center;
            align-items: center;
            width: 80%;
            margin: 0 auto;
        }

        .button {
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .penal { background-color: #a3531c; }
        .administrativo { background-color: #ebb48d; }
        .violencia-familiar { background-color: #a3531c; }
        .civil { background-color: #ebb48d; }
        .laboral { background-color: #a3531c; }
        .otras { background-color: #ebb48d; }

        .button:hover {
            background-color: #5e2e0e; /* Un tono más oscuro al hacer hover */
        }

        .styled-button {
            background-color: #a3531c; /* Marrón */
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
            width: 80%;
            margin: 0 auto;
            display: block;
            text-align: center;
        }

        .styled-button:hover {
            background-color: #5e2e0e; /* Un tono más oscuro al hacer hover */
        }

        .small-button {
            background-color: #a3531c; /* Marrón */
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        .small-button:hover {
            background-color: #5e2e0e; /* Un tono más oscuro al hacer hover */
        }

        footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Causas</h1>
        <p>Gestión de causas</p>
    </header>
    <div class="button-grid">
    <button class="button penal" onclick="location.href='crud-causa-penal.php?rol=<?= urlencode($rol) ?>';">Penal</button>
    <button class="button administrativo" onclick="location.href='crud-causa-administrativo.php?rol=<?= urlencode($rol) ?>';">Administrativo</button>
    <button class="button violencia-familiar" onclick="location.href='crud-causa-vfamiliar.php?rol=<?= urlencode($rol) ?>';">Violencia Familiar</button>
    <button class="button civil" onclick="location.href='crud-causa-civil.php?rol=<?= urlencode($rol) ?>';">Civil</button>
    <button class="button laboral" onclick="location.href='crud-causa-laboral.php?rol=<?= urlencode($rol) ?>';">Laboral</button>
    <button class="button otras" onclick="location.href='crud-causa-otras.php?rol=<?= urlencode($rol) ?>';">Otras</button>

    </div>
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

</body>
</html>
