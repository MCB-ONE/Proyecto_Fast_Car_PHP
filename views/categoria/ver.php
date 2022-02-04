	<div id="flota" class="bg-third bg-flota"></div>
	    <div class="filters">
        <div>
            <p class="h4">Filtrar vehículos</p>
        </div>
        <div>
            <form action="<?=base_url?>categoria/ver" method="POST" class="filter-form row">
                <div class="col-7">
                    <label for="categoria">Categoria</label>
                        <?php $categorias = Utils::showCategorias();?>
                    <select name="categoria" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
                        <?php while ($cat=$categorias->fetch_object()): ?>
                        <option value="<?=$cat->id?>" <?=isset($vehi) && is_object($vehi) && $cat->id == $vehi->categoria_id? 'selected': ''; ?>>
                        <?=$cat->nombre_categoria?>
                        </option>
                        <?php endWhile; ?>
                    </select>
                    <a href="<?=base_url?>vehiculo/flota" class="btn btn-small btn-secondary mt-0">Ver todos</a>
                </div>
                <div class="col-5">
                    <input class="btn btn-dark" type="submit" value="Filtrar"/>
                </div>
                
        </form>
        </div>
    </div>
	<?php if (isset($categoria)): ?>
    	<?php if($vehiculos->num_rows == 0): ?>
    		<p>Actualmente no tenemos vehículos de esta categoria</p>
    	<?php else: ?>
    		<section class="flota col-10">
				<div class="container">
		            <h1 class="section-tittle text-center mt-5">Nuestros <?=$categoria->nombre_categoria?></h1>
		            <div class="row"><!--Utilizamos un bucle para crear cada carta de producto-->
		                <?php while ($vehi = $vehiculos->fetch_object()):?>
		                <div class="col-4">
		                    <div class="card">
		                        <?php if ($vehi->imagen != null): ?>
		                            <img  class="card-img" src="<?= base_url ?>assets/img/vehiculos/<?= $vehi->imagen ?>" alt="<?php echo $vehi->nombre_marca." ".$vehi->modelo?>">
		                        <?php else: ?>
		                            <img  class="card-img" src="<?= base_url ?>assets/img/vehiculos/new_default.png ?>" alt="<?php echo $vehi->nombre_marca." ".$vehi->modelo?>">
		                        <?php endif; ?>
		                        <div class="content">
		                            <h3 class="card-tittle"><?= $vehi->modelo ?></h3>
		                            <h5 class="card-subtittle"><?= $vehi->nombre_marca ?></h5>
		                            <div class="row icons">
		                                <div class="col-6"><img  src="<?= base_url ?>assets/img/combustible.svg" alt="Incono combustible"><p><?= $vehi->combustible ?></p></div>
		                                <div class="col-6"><img  src="<?= base_url ?>assets/img/puerta.svg" alt="Icono puerta"><p><?= $vehi->puertas ?></p></div>
		                                <div class="col-6"><img  src="<?= base_url ?>assets/img/palanca-de-cambios.svg" alt="Icono palanca de cambio"><p><?= $vehi->cambio ?></p></div>
		                                <div class="col-6"><img  src="<?= base_url ?>assets/img/asiento-coche.svg" alt="Iciono asiento coche"><p><?= $vehi->asientos ?></p></div>
		                                <div class="col-6"><img  src="<?= base_url ?>assets/img/maleta.svg" alt="Icono amelta"> <?= $vehi->carga ?></div>
		                                <div class="col-6"><img class="card-img-top" src="<?= base_url ?>assets/img/car.svg" alt="Icono amelta"><?= $vehi->nombre_categoria?></div>
		                            </div>
		                        </div>
		                        <div class="price row">
		                            <div class="col-7">
		                                <p>Por dia</p>
		                                <p><?= $vehi->precio ?>€</p>
		                            </div>
		                            <div class="col-5 my-auto text-uppercase text-center">
		                                <a href="<?= base_url ?>vehiculo/ver&id=<?= $vehi->id ?>#rent"><input class="btn btn-primary" type="submit" value="Alquilar"/></a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            <?php endwhile; ?>
		            </div>			
		        </div>
			</section>
    	<?php endif; ?>
    <?php else: ?>
    	<h1>La categoria que busca no existe</h1>
    <?php endif; ?>


