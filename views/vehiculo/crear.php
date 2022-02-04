<div class="bg-half bg-storage"></div>
<div class="row crear-vehiculo">
<aside class="sidebar col-2">
    <nav class="nav">
      <ul>
        <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
        <li class="active"><a href="<?=base_url?>vehiculo/gestion">Gestionar vehículos</a></li>
        <li><a href="#">Gestionar pedidos</a></li>
        <li><a href="#">Gestionar marcas</a></li>
      </ul>
    </nav>
</aside>
<section class="gestion col-10">
    <?php if (isset($edit) && isset($vehi) && is_object($vehi)):?>
        <h1 class="text-center">Editar datos de <?php echo $vehi->nombre_marca." ".$vehi->modelo?></h1>
        <p class="text-center">Puede actualizar el stock, el precio, la descripción y/o la imagen del vehículo.</p>
        <?php $url_action = base_url."vehiculo/save&id=".$vehi->id;?> <!-- Cambiamos la url a la que apunta el formulario según la acción que recibamos-->
    <?php else: ?>
        <h1 class="text-center">Registrar nuevo vehículo</h1>
        <?php $url_action = base_url."vehiculo/save";?> <!-- Cambiamos la url a la que apunta el formulario según la acción que recibamos-->
    <?php endif; ?>

    <div class="dark-wrapper">
        <form action="<?=$url_action?>" method="POST" class="dark-form row justify-content-around" enctype="multipart/form-data">
        <div class="col-5">
        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias();?>
        <select name="categoria" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
            <?php while ($cat=$categorias->fetch_object()): ?>
                <option value="<?=$cat->id?>" <?=isset($vehi) && is_object($vehi) && $cat->id == $vehi->categoria_id? 'selected': ''; ?>>
                    <?=$cat->nombre_categoria?>
                </option>
            <?php endWhile; ?>
        </select>
        <br>
        <label for="marca">Marca</label>
        <?php $marcas = Utils::showMarcas();?>
        <select name="marca" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
            <?php while ($marca=$marcas->fetch_object()): ?>
                <option value="<?=$marca->id?>" <?=isset($vehi) && is_object($vehi) && $marca->id == $vehi->marca_id? 'selected': ''; ?>>
                    <?=$marca->nombre_marca?>
                </option>
            <?php endWhile; ?>
        </select>
        <br>
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" value="<?=isset($vehi)&& is_object($vehi)? $vehi->modelo : ''; ?>" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
        <br>
        <br>
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($vehi)&& is_object($vehi)? $vehi->stock: ''; ?>" >
        <br>
        <br>
        <label for="combustible">Combustible</label>
        <input type="text" name="combustible" value="<?=isset($vehi)&& is_object($vehi)? $vehi->combustible : ''; ?>" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
        <br>
        <br>
        <label for="puertas">Puertas</label>
        <input type="number" name="puertas" value="<?=isset($vehi)&& is_object($vehi)? $vehi->puertas: ''; ?>" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
        <br>
        <label for="cambio">Cambio</label>
        <select name="cambio" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
                <option value="N/a" selected="">Elige una opción</option>
                <option value="A">Automático</option>
                <option value="M">Manual</option>
        </select>
        <br>
        </div>
        <div></div>
        <div class="col-5">
        <label for="asientos">Asientos</label>
        <input type="number" name="asientos" value="<?=isset($vehi)&& is_object($vehi)? $vehi->asientos: ''; ?>" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
        <br>
        <label for="carga">Carga</label>
        <input type="number" name="carga" value="<?=isset($vehi)&& is_object($vehi)? $vehi->carga: ''; ?>" <?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
        <br>
        <label for="matriculacion">Matriculación</label>
        <input type="number" name="matriculacion" value="<?=isset($vehi)&& is_object($vehi)? $vehi->matriculacion: ''; ?>"<?=isset($vehi)&& is_object($vehi)? 'style="display: none"': ''; ?>>
        <br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion"  cols="30" rows="10"><?=isset($vehi)&& is_object($vehi)? $vehi->descripcion: ''; ?></textarea>        
        <br>
        <label for="imagen">Imagen</label>
        <?php if (isset($vehi)&& is_object($vehi) && !empty($vehi->imagen)): ?>
            <img src="<?=base_url?>/uploads/images/<?=$vehi->imagen?>" alt="<?=$vehi->nombre_marca." ".$vehi->modelo?>">
        <?php endif; ?>
        <input type="file" name="imagen" >
        <br>
        <label for="precio">Precio</label>
        <input type="number" name="precio" value="<?=isset($vehi)&& is_object($vehi)? $vehi->precio: ''; ?>" >
        <br>
        <input class="btn btn-secondary-light" type="submit" value="Registrar"/>
        </div>
        
      </form>
    </div>
    
</section>
</div>