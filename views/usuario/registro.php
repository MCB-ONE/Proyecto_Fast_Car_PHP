<div id="register">
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == "complete"): ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Bienvenido</h3>
                 </div>
                 <div class="modal-body">
                    <h4>Registro realizado con exito.</h4>
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
    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == "failed"): ?>
               <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Error</h3>
                 </div>
                 <div class="modal-body">
                    <h4>No se ha podido registrar.</h4>
                    <p>Por favor, ingrese correctamente los datos.</p>
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
    <?php Utils::deleteSession('register');?>
    
        <section class="form-register">
        <div class="container">
            <div class="row">
                <div class="col-6 bg-gold">

                    <h1 class="big-tittle">Registrate</h1>
                     <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corporis a, tenetur eaque nihil cupiditate eos explicabo quaerat non.</p>
                     <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Atque, laboriosam. Praesentium quia facere necessitatibus non, veritatis asperiores assumenda minima qui neque voluptate autem a architecto quidem quibusdam quos voluptatum.</p>
                     <img src="<?=base_url?>assets/img/car-key.svg" alt="Icono entrena llaves">
                </div>
                <div class="col-6 bg-overlay">
                    <form class="dark-form" action="<?=base_url?>usuario/save" method="POST">
                        <label for="nombre"> Nombre</label>
                        <input type="text" name="nombre" required="required"/>
                        <br>
                        <label for="apellidos"> Apellidos</label>
                        <input type="text" name="apellidos" required="required"/>
                        <br>
                        <label for="email"> Email</label>
                        <input type="email" name="email" required="required"/>
                        <br>
                        <label for="telefono"> Teléfono</label>
                        <input type="text" name="telefono" required="required"/>
                        <br>
                        <label for="contrasena"> Contraseña</label>
                        <input type="password" name="password" required="required"/>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Registrarse"/>
                    </form>
                </div>
            </div>   
        </div>         
    </section>
</div>
