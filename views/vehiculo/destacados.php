<div class="home">
        <?php if (isset($_SESSION['reserva']) && $_SESSION['reserva'] == "complete"): ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Reserva realizada con éxito</h3>
                 </div>
                 
                 <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-primary">Cerrar</a>
                 </div>
            </div>
         </div>
        </div>
        <script>
            window.onload = function modal(){
              $("#mostrarmodal").modal("show");  
            }
        </script>
    <?php elseif(isset($_SESSION['reserva']) && $_SESSION['reserva'] == "failed"): ?>
               <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Error</h3>
                 </div>
                 <div class="modal-body">
                    <h4>No se ha podido realizar su reserva.</h4>
                    <p>Ha de estar registrado para alquilar un vehículo.</p>
             </div>
                 <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-primary">Cerrar</a>
                 </div>
            </div>
         </div>
        </div>
        <script>
            window.onload = function modal(){
              $("#mostrarmodal").modal("show");  
            }
        </script>
    <?php endif; ?>
    <?php Utils::deleteSession('reserva');?>
    <section class="hero">
        <div class="bottom">
            <h2 class="text-uppercase big-tittle">Elige tu próxima aventura</h2>
            <p>Fast Car - Alquiler de coches</p>
            <div class=" container register d-sm-none">
                <p class="d-inline">Suscribete a nuestra newsletter y recive ofertas exclusivas.</p>
                <form class="newsletter-form" action="">
                    <input class="mr-5" type="email" placeholder="Introduce tu dirección de correo...">
                    <a href="#"><button class="btn btn-primary">Subscribirme</button></a>
                </form>
            </div>
        </div>
    </section>
    <section class="cta-call">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-12 col-lg-auto">
                    <p class="text-uppercase">Fácil, rápido y seguro.</p>
                    <p><strong>Alquila tu próximo vehiculo en pocos minutos. </strong></p>
                </div>
                <div class="col-md-12 col-lg-auto">
                    <a href="<?=base_url?>usuario/registro"><button class="btn btn-secondary">Registrarme</button></a>
                </div>
            </div>
        </div>	
    </section>
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="content col-12 col-lg-auto">
                    <h3 class="section-tittle text-lg-right">Sobre nosotros</h3>
                    <div class="text">
                        <p>Lorem, ipsum dolor, sit amet consectetur adipisicing elit. Architecto, distinctio. Tempora quibusdam officiis iure alias magnam maiores molestias veniam atque reprehenderit. Omnis molestias tempora repellat impedit sunt reprehenderit dicta, quas nobis aspernatur aperiam..</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci voluptate architecto et molestiae quos voluptatem vero consequuntur nisi. Sed a itaque, tempore facere aliquid illum in, nesciunt vel assumenda modi. Error sint pariatur vel itaque reiciendis ea et eos eum alias, magni temporibus fuga vero quis dolorem..</p>
                    </div>

                </div>  
                <div class="image col-lg-auto">

                </div>
            </div>
            
        </div>
    </section>
    <section class="new-cars">
        <div class="container">
            <h2 class="section-tittle text-center">Nuevos vehiculos</h2>
            <p class="text-center">Descubre los últimos modelos de nuestra flota.</p>
            <div class="row w-100 m-0"><!--Utilizamos un bucle para crear cada carta de producto-->
            <?php while ($vehi = $vehiculos->fetch_object()):?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <a href="<?= base_url ?>vehiculo/ver&id=<?= $vehi->id ?>">
                        <?php if ($vehi->imagen != null): ?>
                            <img  class="card-img" src="<?= base_url ?>assets/img/vehiculos/<?= $vehi->imagen ?>" alt="<?php echo $vehi->nombre_marca." ".$vehi->modelo?>">
                        <?php else: ?>
                            <img  class="card-img" src="<?= base_url ?>assets/img/vehiculos/new_default.png ?>" alt="<?php echo $vehi->nombre_marca." ".$vehi->modelo?>">
                        <?php endif; ?>
                        </a>
                        <div class="content">
                            <a href="<?= base_url ?>vehiculo/ver&id=<?= $vehi->id ?>">
                                <h3 class="card-tittle"><?= $vehi->modelo ?></h3>
                                <h5 class="card-subtittle"><?= $vehi->nombre_marca ?></h5>
                            </a>
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
</div>