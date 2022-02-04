<div class="bg-half bg-storage"></div>
<div class="row">
<aside class="sidebar col-2">
    <nav class="nav">
      <ul>
        <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
        <li class="active"><a href="<?=base_url?>vehiculo/gestion">Gestionar vehículos</a></li>
        <li><a href="<?=base_url?>reserva/gestion">Gestionar reservas</a></li>
        <li><a href="<?=base_url?>marca/index">Gestionar marcas</a></li>
      </ul>
    </nav>
</aside>
<section class="gestion col-10">
    <!-- Ventana modal que informa de la CREACIÓN de un nuevo vehiculo-->
        <?php if (isset($_SESSION['vehiculo']) && $_SESSION['vehiculo'] == "complete"): ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Vehículo añadido/modificad con éxito</h3>
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
    <?php elseif(isset($_SESSION['vehiculo']) && $_SESSION['vehiculo'] == "failed"): ?>
               <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Error</h3>
                 </div>
                 <div class="modal-body">
                    <h4>No se ha podido añadir el vehículo.</h4>
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
    <?php Utils::deleteSession('vehiculo');?>
    <!-- Ventana modal que informa de la ELIMINACIÓN de un nuevo vehiculo-->
        <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"): ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Vehículo eliminado con éxito</h3>
                 </div>
                 <div class="modal-body">
                    <h4>El vehiculo con id <?php echo $_SESSION['delete_id'];?>
                     ha sido borrado de la base de datos.</h4>
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
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == "failed"): ?>
               <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Error</h3>
                 </div>
                 <div class="modal-body">
                    <h4>No se ha podido eliminar el vehículo.</h4>
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
    <?php   Utils::deleteSession('delete');
            Utils::deleteSession('delete_id');
    ?>


    <h1 class="text-center">Gestión de vehículos</h1>
    <div class="dark-wrapper">
        <a href="<?=base_url?>vehiculo/crear"><button class="btn btn-secondary-light mb-4 mt-2">Añadir vehículo</button></a>
    	<table class="table-dark">
    	<tr>
    		<th>ID</th>
    		<th>Categoria</th>
    		<th>Marca</th>
            <th>Modelo</th>
    		<th>Precio</th>
    		<th>Stock</th>
            <th>Acciones</th>
    	</tr>
	    <?php while ($prod = $vehiculos->fetch_object()):?>
	    	<tr>
		    	<td><?php echo $prod->id; ?></td>
		    	<td><?php echo $prod->nombre_categoria; ?></td>
                <td><?php echo $prod->nombre_marca; ?></td>
		    	<td><?php echo $prod->modelo; ?></td>
		    	<td><?php echo $prod->precio; ?></td>
		    	<td><?php echo $prod->stock; ?></td>
                <td>
                    <a href="<?=base_url?>vehiculo/editar&id=<?=$prod->id?>"><button class="btn btn-small btn-secondary-light mr-3 mt-0">Editar</button></a>
                    <a href="<?=base_url?>vehiculo/eliminar&id=<?=$prod->id?>"><button class="btn btn-small btn-primary mt-0">Eliminar</button></a>
                </td>
	    	</tr>
	   	<?php endwhile; ?>	
   	</table>
    </div>
    
</section>
</div>