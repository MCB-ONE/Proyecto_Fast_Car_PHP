<div class="bg-half bg-storage"></div>
<div class="row">
<aside class="sidebar col-2">
    <nav class="nav">
      <ul>
        <li class="active"><a href="#">Gestionar categorias</a></li>
        <li><a href="<?=base_url?>vehiculo/gestion">Gestionar vehiculos</a></li>
        <li><a href="#">Gestionar pedidos</a></li>
        <li><a href="#">Gestionar marcas</a></li>
      </ul>
    </nav>
</aside>
<section class="gestion col-10">
    <h1 class="text-center">Crear nueva categoria</h1>
    <div class="dark-wrapper">
    	<form action="<?=base_url?>categoria/save" method="POST" class="dark-form">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required="required"/>
        <br>
        <input class="btn btn-secondary-light" type="submit" value="Añadir"/>
      </form>

    </div>
    
</section>
</div>