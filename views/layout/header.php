	<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alquiler de coches</title>
	<!--FONTS-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url?>assets/css/bootstrap.min.css">
	<!-- CSS -->
	<link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
	<link rel="stylesheet" href="<?=base_url?>assets/css/responsive.css">
</head>
<body>
<header class="header">
	<nav id="menu" class="navbar navbar-expand-lg fixed-top bg-transparent">
		<a class="navbar-brand" href="<?=base_url?>">
    		<img src="<?=base_url?>assets/img/logo.png" alt="Gold Car logo">
 		</a>
    	<button type="button" class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
	  <div class="collapse navbar-collapse " id="menuPrincipal">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link text-uppercase" href="<?=base_url?>">INICIO <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-uppercase" href="<?=base_url?>vehiculo/flota">FLOTA</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-uppercase" href="<?=base_url?>contact/index">CONTACTO</a>
	      </li>
	      <li class="nav-item">
		    <div class="dropdown nav-login">
                        <img src="<?=base_url?>assets/img/user.svg" alt="Icono login" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php if(!isset($_SESSION['identity'])):?> <!-- Si no exite la sesion identity (usuario no registrado) -->
                                <form method="POST" class="nav-form" action="<?=base_url?>usuario/login">
                                    <label for="email"> Email</label>
                                    <input type="email" name="email" required="required"/>
                                    <label for="contrasena"> Contraseña</label>
                                    <input type="password" name="password" required="required"/>
                                    <input class="btn btn-dark" type="submit" value="Login"/>
                                </form>
                            	<p class="text-md-center mt-md-2">Registrate en este <a href="<?=base_url?>usuario/registro" class="register-link">enlace</a></p>
                            	<?php else: ?><!--Si existe sesión identity (usuario registrado)-->
	                            <p class="user-name">Bienvenido <strong><?= $_SESSION['identity']->nombre?></strong></p>
	                            <ul class="list-unstyled">
	                            	<li><a href="<?=base_url?>reserva/mis_reservas">Ver mis pedidos</a></li>
	                            	<?php if (isset($_SESSION['admin'])):?>
		                            	<li><a href="<?=base_url?>reserva/gestion">Gestionar reservas</a></li>
		                            	<li><a href="<?=base_url?>vehiculo/gestion">Gestionar vehiculos</a></li>
		                            	<li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
		                            	<li><a href="<?=base_url?>marca/index">Gestionar marcas</a></li>
									<?php endif; ?>
	                            </ul>
	                            	<div class="logout">
	                            		<a href="<?=base_url?>usuario/logout"><img src="<?=base_url?>assets/img/logout.svg" alt="Icono logout"></a>
	                            	</div>
	                            </div>
                            	<?php endif;?>
                            </div>
                    </div>
	      </li>
	    </ul>
	</nav>
</header>
<div class="page">