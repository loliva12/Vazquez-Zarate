<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
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

        .signup-form {
            width: 500px;
            margin: 0 auto;
            padding: 30px 0;
        }

        .signup-form h2 {
            color: #333;
            margin: 0 0 30px 0;
            display: inline-block;
            padding: 0 30px 10px 0;
            border-bottom: 3px solid #a3531c;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group.row {
            margin-bottom: 20px;
        }

        .signup-form label {
            font-weight: normal;
            font-size: 14px;
            line-height: 2;
        }

        .signup-form input[type="checkbox"] {
            position: relative;
            top: 1px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #a3531c;
            border: none;
            margin-top: 20px;
            min-width: 140px;
        }

        .signup-form .btn:hover,
        .signup-form .btn:focus {
            background: #ebb48d;
            outline: none !important;
        }

        .signup-form a {
            color: #a3531c;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #fff;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="signup-form">
        <form action="./insert-usuario.php" method="post" class="form-horizontal">
            <div class="row">
                <div class="col-8 offset-4">
                    <i class="fas fa-balance-scale fa-2x" style="color: #a3531c;"></i>
                    <h2>Crear Usuario</h2>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">Nombre de usuario</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="username" placeholder="Ingrese nombre de usuario" autofocus required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">E-mail</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" placeholder="Ingrese email" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">Contraseña</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="contrasenia" placeholder="Ingrese contraseña" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">Rol</label>
                <div class="col-8">
                    <select name="rol" class="form-control" autofocus>
                        <option value="Administrador">Administrador</option>
                        <option value="Secundario">Secundario</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8 offset-4">
                    <button type="submit" class="btn btn-primary btn-lg" name="create">Crear</button>
                    <a href="index.html" class="btn btn-secondary btn-lg">Cancelar</a>
                </div>
            </div>
        </form>
        <div class="text-center">Ya tenes cuenta? <a href="./index.html">Iniciar Sesión</a></div>
    </div>
</body>

</html>
