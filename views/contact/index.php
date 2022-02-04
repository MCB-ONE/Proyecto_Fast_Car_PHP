<div class="bg-third bg-contact"></div>
<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				    <h1 class="section-tittle mt-5">Contacto</h1>
				    <p>Puede contactar con nosotros a través del formulario que encontrará a continuación, o si lo prefiere utilice las vías de comunicación más comunes y nuestro equipo se pondrá en contacto con usted de inmediato.</p>
				    <h2>FastCar S.L</h2>
				    <ul class="list-unstyled">
						<li><img src="<?=base_url?>assets/img/localizacion.svg" alt="Icono localización">Calle Industrial, 130,  Barcelona </li>
						<li><img src="<?=base_url?>assets/img/telefono.svg" alt="Icono teléfono">99 999 999</li>
						<li><img src="<?=base_url?>assets/img/email.svg" alt="Icono email">correocontacto@fastcar.es</li>
					</ul>


			</div>
			<div class="col-12 col-lg-6">
                    <form class="light-form mt-5" action="<?=base_url?>usuario/save" method="POST">
                        <label for="nombre"> Nombre</label>
                        <input type="text" name="nombre" required="required"/>
                        <br>
                        <label for="email"> Email</label>
                        <input type="email" name="email" required="required"/>
                        <br>
                        <textarea name="mensaje" cols="20" rows="5" placeholder="Escriba su mensaje..."></textarea>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Enviar"/>
                    </form>
            </div> 
        </div> 
    </div>     
</section>
