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
    <h1 class="text-center">Crear nueva marca</h1>
    <div class="dark-wrapper">
    	<form action="<?=base_url?>marca/save" method="POST" class="dark-form">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required="required"/>
        <br>
        <input class="btn btn-secondary-light" type="submit" value="Añadir"/>
      </form>

    </div>
    
</section>
</div>