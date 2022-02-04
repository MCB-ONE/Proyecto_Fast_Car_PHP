<div class="bg-third bg-flota"></div>
<section class="product-details">
	<h1 class="section-tittle text-center my-5">Confirmación de alquiler de <?= $vehiculo->nombre_marca ?> <?= $vehiculo->modelo ?></h1>
	<div class="container-prereserva">
		 <div class="row">
		 	<div  id="rent" class="col-8 p-0 prereserva-image">
                <img src="<?= base_url ?>assets/img/vehiculos/<?= $vehiculo->imagen ?>" alt="<?php echo $vehiculo->nombre_marca." ".$vehiculo->modelo?>">              
            </div>
		 	<div class="col-4 details-text">
				<p class="col-12 details-tittle-block">Detalles del vehiculo</p>
				<ul>
					<li><strong>Marca:</strong> <?= $vehiculo->nombre_marca ?></li>
					<li><strong>Modelo:</strong> <?= $vehiculo->modelo ?></li>
					<li><strong>Categoria:</strong> <?= $vehiculo->nombre_categoria ?></li>
					<li><strong>Precio:</strong> <?= $vehiculo->precio ?>€/dia</li>
				</ul>
				<p class="col-12 details-tittle-block">Fechas de reserva</p>
				<ul>				
					<li><strong>Fecha de recogida:</strong> <?= $reserva->getFecha_inicio() ?></li>					
					<li><strong>Fecha de devolución:</strong> <?= $reserva->getFecha_final() ?></li>
					<li><strong>Dias totales:</strong> <?= $reserva->getDias_totales() ?></li>
				</ul>
				<div class="details-price row mt-3 ml-0">
                	<p class="col-12 details-tittle-block">Precio total: <strong><?= $reserva->getCoste_total() ?>€</strong></p>
            	</div>
            	<a href="<?= base_url ?>reserva/save"><button class="btn btn-primary w-100">Confirmar</button></a>
		 	</div>
    	</div>
	</div>
</section>

