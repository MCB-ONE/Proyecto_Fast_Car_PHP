<div class="bg-half bg-storage"></div>
<div class="row">
<aside class="sidebar col-2">
    <nav class="nav">
      <ul>
        <li><a href="<?=base_url?>reserva/gestion">Gestionar reservas</a></li>
        <li class="active"><a href="#">Gestionar categorias</a></li>
        <li><a href="<?=base_url?>vehiculo/gestion">Gestionar vehiculos</a></li>
        <li><a href="<?=base_url?>marca/index">Gestionar marcas</a></li>
      </ul>
    </nav>
</aside>
<section class="gestion col-10">
        <!-- Ventana modal que informa de la CREACIÓN de un nueva marca-->
        <?php if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == "complete"): ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>categoria añadida con éxito</h3>
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
    <?php elseif(isset($_SESSION['categoria']) && $_SESSION['categoria'] == "failed"): ?>
               <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Error</h3>
                 </div>
                 <div class="modal-body">
                    <h4>No se ha podido añadir/crear la nueva categoria.</h4>
                    <p>Por favor, revise los datos introducidos.</p>
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
    <?php Utils::deleteSession('categoria');?>
    <h1 class="text-center">Gestión de categorias</h1>
    <div class="dark-wrapper">
        <a href="<?=base_url?>categoria/crear"><button class="btn btn-secondary-light">Añadir categoria</button></a>
    	<table class="table-dark">
    	<tr>
    		<th>ID</th>
    		<th>Nombre</th>
    	</tr>
	    <?php while ($cat = $categorias->fetch_object()):?>
	    	<tr>
		    	<td><?php echo $cat->id; ?></td>
		    	<td><?php echo $cat->nombre_categoria; ?></td>
	    	</tr>
	   	<?php endwhile; ?>	
   	</table>
    </div>
    
</section>
</div>