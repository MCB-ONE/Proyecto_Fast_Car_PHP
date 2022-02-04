<div id="flota" class="bg-third bg-flota"></div>
<section class="product-details">
	<div class="container my-5">
<?php if (isset($vehi)): ?>
		 <div class="row">
		 	<div class="col-6 details-text">
		 		<h4 class="details-category"><?= $vehi->nombre_categoria ?></h4>
		 		<h3 class="details-tittle"><?= $vehi->modelo ?></h3>
                <h5 class="details-subtittle"><?= $vehi->nombre_marca ?></h5>
                <div class="row mt-5 ml-0">
                	<p class="details-tittle-block">Descripción</p>
                	<p><?= $vehi->descripcion ?></p>
                </div>
                <div class="row details-icons mt-3 ml-0">
                	<p class="col-12 details-tittle-block">Especificaciones</p>
                                <div class="col-4 mb-2"><img  src="<?= base_url ?>assets/img/combustible.svg" alt="Incono combustible"><p><?= $vehi->combustible ?></p></div>
                                <div class="col-4 mb-2"><img  src="<?= base_url ?>assets/img/puerta.svg" alt="Icono puerta"><p><?= $vehi->puertas ?></p></div>
                                <div class="col-4 mb-2"><img  src="<?= base_url ?>assets/img/palanca-de-cambios.svg" alt="Icono palanca de cambio"><p><?= $vehi->cambio ?></p></div>
                                <div class="col-4"><img  src="<?= base_url ?>assets/img/asiento-coche.svg" alt="Iciono asiento coche"><p><?= $vehi->asientos ?></p></div>
                                <div class="col-4"><img  src="<?= base_url ?>assets/img/maleta.svg" alt="Icono amelta"><p><?= $vehi->carga ?></p> </div>
                                <div class="col-4"><img class="card-img-top" src="<?= base_url ?>assets/img/car.svg" alt="Icono amelta"><p><?= $vehi->nombre_categoria?></p></div>
                </div>
                <div class="details-price row mt-3 ml-0">
                	<p class="col-12 details-tittle-block">Precio</p>
                    <div class="col-4">
                    	<p class="price"><?= $vehi->precio ?>€</p>
                        <p>Por dia</p>
                    </div>
                </div>
		 	</div>
            <div  id="rent" class="col-6 p-0 details-image">
                
                    <img src="<?= base_url ?>assets/img/vehiculos/<?= $vehi->imagen ?>" alt="<?php echo $vehi->nombre_marca." ".$vehi->modelo?>">
                <div class="row  rent-form-wrapper">
                    <div class="col-6">                                   
                        <form action="<?= base_url ?>prereserva/add" method="POST" class="rent-form">
                            <h4>Reservar</h4>
                                <label>Des de:</label>
                                <input type="date" name="fecha_inicio" placeholder="Fecha de inicio" required>
                                <label class="mt-3">Hasta:</label>
                                <input type="date" name="fecha_final" placeholder="Fecha final" required>
                                <input type="hidden" name="vehiculo_id" value= "<?php echo $vehi->id; ?>" />
                                <input class="btn btn-primary" type="submit" value="Alquilar"/>
                        </form>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url ?>vehiculo/flota"><button class="btn btn-secondary-light">Ver todos</button></a>
                    </div>
                </div>                
            </div>
		 </div>
<?php else: ?>
<h1 class="text-center">Detalles del vehículo no disponibles.</h1>
<?php endif; ?>
    </div>
</section>