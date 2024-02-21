<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            color: #999;
            background: #f3f3f3;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            border-color: #eee;
            min-height: 41px;
            box-shadow: none !important;
        }

        .form-control:focus {
            border-color: #a3531c;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .card {
            border: none;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: #a3531c;
            color: white;
            font-weight: bold;
        }

        .card-body {
            background-color: #fff;
        }

        .btn-primary {
            background-color: #a3531c;
            border-color: #a3531c;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #ebb48d;
            border-color: #ebb48d;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Cambiar contraseña</div>
                    <div class="card-body">
                        <form action="update-password.php" method="POST">
                            <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                            <div class="form-group">
                                <label for="password">Nueva contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirmar contraseña</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cambiar</button>
                                <a href="index.html" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
