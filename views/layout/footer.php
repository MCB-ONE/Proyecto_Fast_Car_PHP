</div>
<footer class="shadow-top">
	<div class="container">
		<div class="row">
			<div class="order-sm-2 order-lg-1 col-md-6 col-lg-3 contact">
			<h4>Contacto</h4>
			<ul class="list-unstyled">
				<li><img src="<?=base_url?>assets/img/localizacion.svg" alt="Icono localización">Calle Industrial, 130,  Barcelona </li>
				<li><img src="<?=base_url?>assets/img/telefono.svg" alt="Icono teléfono">99 999 999</li>
				<li><img src="<?=base_url?>assets/img/email.svg" alt="Icono email">correocontacto@fastcar.es</li>
			</ul>
			</div>
			<div class="order-md-3 order-lg-2 col-md-8 col-lg-6 registro text-center shadow-top">
				<h4>Newsletter</h4>
				<p class="d-inline">Suscribete a nuestra newsletter y recive ofertas exclusivas.</p>
					<form class="newsletter-form" action="">
						<input  type="email" placeholder="Introduce tu dirección de correo...">
						<button class="btn-footer btn-primary">Subscribirme</button>
					</form>
			</div>
			<div class="order-sm-2 col-md-6 col-lg-2 social text-lg-right">
				<h4>Siguenos</h4>
				<i><img src="<?=base_url?>assets/img/instagram-footer.svg" alt="Icono nstagram"></i>
				<i><img src="<?=base_url?>assets/img/twitter-footer.svg" alt="Icono Twitter"></i>
				<i><img src="<?=base_url?>assets/img/facebook-footer.svg" alt="Icono Facebook"></i>
			</div>
		</div>
	</div>
</footer>
<!--JS -->
<script src="<?=base_url?>assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="<?=base_url?>assets/js/bootstrap.bundle.min.js"></script>
<!-- 	Efecto header -->
<script>

	$(document).ready(function() {

		var mediaqueryList = window.matchMedia("(min-width: 769px)");
		mediaqueryList.addListener( function(EventoMediaQueryList) {
		/* Cambio de color bg header al hace scroll solo en escritorio*/
		$(window).scroll(function () { 
	        if ($("#menu").offset().top > 90) {
	        	$("#menu").removeClass('bg-transparent');
	        	$("#menu").addClass('bg-dark');
	        	$("#menu").addClass('shadow-bottom');
	        }else{
	        	$("#menu").removeClass('bg-dark');
	        	$("#menu").removeClass('shadow-bottom');
	        	$("#menu").addClass('bg-transparent');
	        }
	    });
	});

	/* Animación menú hamburguesa*/
	    $('.navbar-toggle').click(function(){
	        $("#menu").removeClass('bg-transparent');
        	$("#menu").addClass('bg-dark');
	        $(this).toggleClass('act');
	        if ($(this).hasClass('act')) {
	            $('.navbar-toggle').addClass('act');
	        } else {
	            $('.navbar-toggle').removeClass('act');
	        }

	    });	
    }); 


</script>
</body>
</html>