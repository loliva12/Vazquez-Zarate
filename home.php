
<?php
// Obtener el valor de $rol de los parámetros de consulta
if (isset($_GET['rol'])) {
    $rol = $_GET['rol'];
} else {
    // Manejar el caso en que $rol no esté definido en los parámetros de consulta
    $rol = "Valor predeterminado";
}

// Verificar el rol del usuario y definir $showGastos
if ($rol == 'Administrador') {
    $showGastos = true;
} else {
    $showGastos = false;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Archivos de bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	header {
		background: #b65823;
		font-family: 'Varela Round', sans-serif;
		/* background-image:url('/xampp/htdocs/estudio/Imagenes/1.png'); */
	}
    .form-inline {
        display: inline-block;
    }
	.navbar {
		color: #fff;
		background: linear-gradient(to right, #a3531c, #ebb48d);
		padding: 5px 16px;
		border-radius: 0;
		border: none;
		box-shadow: 0 0 4px rgba(0,0,0,.1);
	}
	.navbar img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin-right: 10px;
	}
	.navbar .navbar-brand {
		color: #fff;
		padding-left: 0;
		padding-right: 20px;
		font-size: 20px; 		
	}
	.navbar .navbar-nav > li > a {
		padding-top: 15px; /* Alinear verticalmente los elementos */
		padding-bottom: 15px; /* Alinear verticalmente los elementos */
		font-size: 14px; /* Reducir el tamaño del texto */
	}
	
	.navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
		color: #fff;
	}
	.navbar .navbar-brand i {
		font-size: 20px;
		margin-right: 3px;
	}
	.search-box {
        position: relative;
    }	
    .search-box input {
        padding-right: 35px;
		min-height: 38px;
		border: none;
		background: #fff;
        border-radius: 3px !important;
    }
	.search-box input:focus {		
		background: #fff;
		box-shadow: none;
	}
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 10px 7px;
		height: 100%;
    }
    .search-box i {
        color: #fff;
		font-size: 19px;
    }
	.navbar ul li i {
		font-size: 18px;
	}
	.navbar .nav-item span {
		position: relative;
		top: 3px;
	}
	.navbar .nav > li a {
		color: #fff;
		padding: 8px 15px;
		font-size: 14px;		
	}

	.navbar .nav > li a:hover, .navbar .nav > li a:focus {
		color: #fff;
		text-shadow: 0 0 4px rgba(255,255,255,0.3);
	}
	.navbar .nav > li > a > i {
		display: block;
		text-align: center;
	}


	.navbar .dropdown-menu i {
		font-size: 16px;
		min-width: 22px;
	}
    .navbar .dropdown-menu .material-icons {
        font-size: 21px;
        line-height: 16px;
        vertical-align: middle;
        margin-top: -2px;
    }
	.navbar .dropdown.open > a, .navbar .dropdown.open > a:hover, .navbar .dropdown.open > a:focus {
		color: #fff;
		background: none !important;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .dropdown-menu li a {
		color: #777 !important;
		padding: 8px 20px;
		line-height: normal;
	}
	.navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:focus {
		color: #333 !important;
		background: transparent !important;
	}
	.navbar .nav .active a, .navbar .nav .active a:hover, .navbar .nav .active a:focus {
		color: #fff;
		text-shadow: 0 0 4px rgba(255,255,255,0.2);
		background: transparent !important;
	}
	.navbar .nav .user-action {
		padding: 9px 15px;
	}
	.navbar .navbar-toggle {
		border-color: #fff;
	}
	.navbar .navbar-toggle .icon-bar {
		background: #fff;
	}
	.navbar .navbar-toggle:focus, .navbar .navbar-toggle:hover {
		background: transparent;
	}
	.navbar .navbar-nav .open .dropdown-menu {
		background: #faf7fd;
		border-radius: 1px;
		border-color: #faf7fd;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .divider {
		background-color: #e9ecef !important;
	}
	@media (min-width: 1200px){
		.form-inline .input-group {
			width: 350px;
			margin-left: 30px;
		}
	}
	@media (max-width: 1199px){
		.navbar .nav > li > a > i {
			display: inline-block;			
			text-align: left;
			min-width: 30px;
			position: relative;
			top: 4px;
		}
	
		.navbar .navbar-collapse {
			border: none;
			box-shadow: none;
			padding: 0;
		}
		.navbar .navbar-form {
			border: none;			
			display: block;
			margin: 10px 0;
			padding: 0;
		}
		.navbar .navbar-nav {
			margin: 8px 0;
		}
		.navbar .navbar-toggle {
			margin-right: 0;
		}
		.input-group {
			width: 100%;
		}


	}
	
		  /* Para el ancho y alto de las imagenes. Modificalo a gusto =)  */
		.carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 100%;
            height: 500px;
            margin: auto;
        }
        /* Para los margenes del contendor de las fotos. Podes cambiarle el ancho a gusto tambien! */
        .carousel-control {
            width: 10%;
        }
	
	footer {
  		background-color: #693614; /* Color de fondo */
  		color: #fff; /* Color de texto */
		text-decoration: none;
  		padding: 20px; /* Espacio interior */
  		text-align: center; /* Alineación de texto */
  		position: absolute; /* Posición absoluta */
  		bottom: 10; /* Alinear el footer en la parte inferior */
  		width: 100%; /* Ancho completo */
		margin-top: 50px; /* Aquí puedes ajustar la cantidad de píxeles según tus necesidades */
	}


</style>
</head> 
<header>
<nav class="navbar navbar-inverse navbar-expand-xl navbar-dark">
	<div class="navbar-header">
		<a class="navbar-brand" href="#"><i class="fa fa-cube"></i>Vázquez<b>·Zarate</b></a>  		
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>

            <br>
		    <ul class="nav navbar-nav navbar-right" >
			    <li><a type="button" onclick="location.href='./home.php'"><i class="fa fa-home"></i><span>Inicio</span></a></li>
				<li><a href="./crud-cliente.php?rol=<?= urlencode($rol) ?>"><i class="fa fa-users"></i><span>Clientes</span></a></li>
				<li><a type="button" onclick="location.href='./causas.php?rol=<?= urlencode($rol) ?>'"><i class="fa fa-address-card"></i><span>Causas</span></a></li>
				<li><a type="button" onclick="location.href='./calendar.php?rol=<?= urlencode($rol) ?>'"><i class="fa fa-calendar-o"></i><span>Eventos y Agenda</span></a></li>
				<li><a href="https://docs.google.com/spreadsheets/d/1rDYrlrWkxf5Ni44xPeLZP2TY9Hz9MST3/edit#gid=1209830544"><i class="fa fa-money"></i><span>Gastos</span></a></li>
				<li><a type="button" onclick="location.href='./crud-rrhh.php?rol=<?= urlencode($rol) ?>'"><i class="fa fa-user-plus"></i><span>Recursos Humanos</span></a></li>
				<li><a href='./modelo_juris.php?rol=<?= urlencode($rol) ?>'"><i class="fa fa-folder"></i><span>Modelos y Jurisprudencia</span></a></li>
				<li><a type="button" onclick="location.href='./crud-tribunal.php?rol=<?= urlencode($rol) ?>'"><i class="fa fa-folder-open"></i><span>Tribunales</span></a></li>
				<li><a href="https://www.justiciacordoba.gob.ar/tasajusticia/Comprobantes/_Comprobantes_Administrativo.aspx"><i class="fa fa-percent"></i><span>Tasas-Aportes</span></a></li>
				<li><a href="https://www.afip.gob.ar/landing/default.asp"><i class="fa fa-dollar"></i><span>Facturacion-AFIP</span></a></li>
			    <li><a href="https://www.justiciacordoba.gob.ar/JusticiaCordoba/Inicio/index.aspx"><i class="fa fa-hashtag"></i><span>Justicia Cordoba</span></a></li>
			</ul>

	</div>
</nav>
</header>
<body>
	<div class="container">
		<br>
		<div id="carrusel" class="carousel slide" data-ride="carousel">
	  
		  <!-- Opcional, bullets abajo para saltar directamente a una foto (si los pones tiene q haber 1 por foto) -->
		  <ol class="carousel-indicators">
			<li data-target="#carrusel" data-slide-to="0" class="active"></li>
			<li data-target="#carrusel" data-slide-to="1"></li>
			<li data-target="#carrusel" data-slide-to="2"></li>
		  </ol>
	  
		  <!-- Contenedor de las fotos -->
		  <div class="carousel-inner" role="listbox">
	  
			<!-- Foto 1 -->
			<div class="item active">
			  <img src="https://www.coneau.gob.ar/coneau/wp-content/uploads/2017/12/abogacia.jpg">
			</div>
	  
			<!-- Foto 2 -->
			<div class="item">
			  <img src="https://media.elentrerios.com/fotos-v2/2021/03/11/l_1615492539.jpg">
			</div>
	  
			<!-- Foto 3 -->
			<div class="item">
			  <img src="https://www.rosarioabogados.com.ar/resources/users-uploads/galleries/117/noticias/historia-de-la-abogacia.jpg">
			  
			</div>
	  
		  </div>
	  
		  <!-- Controles para pasar las fotos -->
		  <a class="left carousel-control" href="#carrusel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carrusel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
	  </div>
</body>
<footer>
	<div class="footer-style">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
			
				  	<a class="fa fa-instagram " style="font-size:36px;color:#ebb48d" href="https://www.instagram.com/staff.deabogados/"></a></li>
					<a class="fa fa-linkedin " style="font-size:36px;color:#ebb48d" href="https://www.linkedin.com/in/estudio-v%C3%A1zquez-z%C3%A1rate-22bb8b1ba/"></a></li>
					<a class="fa fa-at " style="font-size:36px;color:#ebb48d;" href="mailto:gestion.staffdeabogados@gmail.com"></a></li>
			  
					<a href="cerrar_sesion.php" style="font-size:25px; color: #ebb48d;" class="pull-right">
						<i class="fa fa-sign-out fa-lg" style="margin-right: 5px;"></i>
					</a>
				
				</div>
			</div>
		</div>
	</div>
    
  </footer>
</html>   
<?php
// Si la opción de gastos debe mostrarse, se incluye en el menú
if ($showGastos) {
    echo '<style>.navbar .nav > li:nth-child(5) { display: block; }</style>';
} else {
    echo '<style>.navbar .nav > li:nth-child(5) { display: none; }</style>';
}
?>