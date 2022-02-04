<div class="bg-half bg-storage"></div>
<div class="row">
<aside class="sidebar col-2">
    <nav class="nav">
      <ul>
      	<li><a href="<?=base_url?>reserva/gestion">Gestionar reservas</a></li>
        <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
        <li><a href="<?=base_url?>vehiculo/gestion">Gestionar vehiculos</a></li>
        <li class="active"><a href="#">Gestionar marcas</a></li>
      </ul>
    </nav>
</aside>
<section class="gestion col-10">
      <!-- Ventana modal que informa de la CREACIÓN de un nueva marca-->
        <?php if (isset($_SESSION['marca']) && $_SESSION['marca'] == "complete"): ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Marca añadida con éxito</h3>
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
    <?php elseif(isset($_SESSION['marca']) && $_SESSION['marca'] == "failed"): ?>
               <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <h3>Error</h3>
                 </div>
                 <div class="modal-body">
                    <h4>No se ha podido añadir/crear la nueva marca.</h4>
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
    <?php Utils::deleteSession('marca');?>
    <h1 class="text-center">Gestión de marcas</h1>
    <div class="dark-wrapper">
    	<table class="table-dark"> 
        <a href="<?=base_url?>marca/crear"><button class="btn btn-secondary-light mt-3 mb-4">Añadir marca</button></a>    
    	<tr>
    		<th>ID</th>
    		<th>Nombre</th>
    	</tr>
	    <?php while ($marca = $marcas->fetch_object()):?>
	    	<tr>
		    	<td><?php echo $marca->id; ?></td>
		    	<td><?php echo $marca->nombre_marca; ?></td>
	    	</tr>
	   	<?php endwhile; ?>	
   	</table>
   </div>
    
</section>
</div>
