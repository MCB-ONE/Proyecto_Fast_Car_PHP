<div class="bg-half bg-storage"></div>   
	<section class="product-details rent-details">
		<div class="container my-5">
			<h1 class="text-center section-tittle my-5">Detalles de la reserva nº <?=$reserva->reserva_id; ?></h1>
			<?php if (isset($vehiculo_reserva)): ?>
			 <div class="row">
			 	<div class="col-6 details-text">
			 		<h4 class="details-category"><?= $vehiculo_reserva->nombre_categoria ?></h4>
			 		<h3 class="details-tittle"><?= $vehiculo_reserva->modelo ?></h3>
	                <h5 class="details-subtittle"><?= $vehiculo_reserva->nombre_marca ?></h5>
	                <h5 class="details-subtittle">Precio por dia: <?= $vehiculo_reserva->precio ?>€</h5>	      
	                <p class="details-tittle-block mt-5">Información de la reserva</p>
						<ul>
							<li><strong>Numero de reserva:</strong> <?= $reserva->reserva_id ?></li>	
							<li><strong>Reserva realizada el:</strong> <?= $reserva->fecha_reserva ?></li>		
							<li><strong>Fecha de recogida:</strong> <?= $reserva->fecha_inicio ?></li>
							<li><strong>Fecha de devolución:</strong> <?= $reserva->fecha_final ?></li>
							<li><strong>Dias totales:</strong> <?= $reserva->dias_totales ?></li>
							<li><strong>Precio total:</strong> <?= $reserva->coste_total ?>€</li>
							<?php if ($reserva->estado=="Por confirmar"):?>
								<li><strong>Estado:</strong> <strong class="not-confirm"><?= $reserva->estado ?></strong></li>
							<?php else:?>
								<li><strong>Estado:</strong> <strong class="confirm"><?= $reserva->estado ?></strong></li>
							<?php endif; ?>
														
						</ul>
                    <?php if (isset($_SESSION['admin'])): ?>
						<p class="details-tittle-block mt-5">Cambiar estado de la reserva</p>
						<form action="<?= base_url ?>reserva/estado" method="POST">
							<input type="hidden" name="reserva_id" value="<?= $reserva->reserva_id?>">
							<select name="estado" class="p-1">
								<option value="Por confirmar">Por confirmar</option>
								<option value="Confirmado">Confirmado</option>
							</select>
							<input type="submit" value="Cambiar estado" class="btn btn-small btn-primary mt-0 ml-2">
						</form>
					<?php endif; ?>						
			 		<?php if ($reserva->estado=="Por confirmar"): ?>
                        <p>Puede anular su reserva si esta no ha sido confirmada. <br> (Estado: Por confirmar)</p>
                        <a href="<?= base_url ?>reserva/anular&id=<?= $reserva->reserva_id ?>" class="btn btn-small btn-secondary-light mt-0">Anular</a>
                    <?php endif; ?>

			 	</div>
	            <div  class="col-6 p-0 details-image ">
					<img src="<?= base_url ?>assets/img/vehiculos/<?= $vehiculo_reserva->imagen ?>" alt="<?php echo $vehiculo_reserva->nombre_marca." ".$vehiculo_reserva->modelo?>" >               
	            </div>
			 </div>
			<?php else: ?>
			<h1 class="text-center">Detalles de la reserva no disponibles.</h1>
			<?php endif; ?>
	    </div>
	</section>
</div>