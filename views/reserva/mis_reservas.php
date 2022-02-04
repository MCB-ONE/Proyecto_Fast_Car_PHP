<div class="bg-half bg-storage"></div>
<div class="row">
        <aside class="sidebar col-2">
          <?php if (isset($gestion)=="true" && $gestion=="true"):?>
                <nav class="nav">
                  <ul>
                    <li class="active"><a href="<?=base_url?>reserva/gestion">Gestionar reservas</a></li>
                    <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
                    <li><a href="<?=base_url?>vehiculo/gestion">Gestionar vehiculos</a></li>
                    <li><a href="#">Gestionar marcas</a></li>
                  </ul>
                </nav>
          <?php endif; ?>
      </aside>
    <section class="gestion col-10">
      <?php if (isset($gestion)=="true" && $gestion=="true"):?>
            <h1 class="text-center section-tittle my-5">Gestionar reservas</h1>
      <?php else: ?>
            <h1 class="text-center section-tittle my-5">Mis Reservas</h1>
      <?php endif; ?>
          <!-- Ventana modal que informa de la ANULACIÓN de una reserva-->
            <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"): ?>
            <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h3>Reserva anulada con éxito</h3>
                     </div>
                     <div class="modal-body">
                        <h4>La de reserva nº <?php echo $_SESSION['delete_id'];?>
                         ha sido anulada.</h4>
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
                        <h4>No se ha podido anular su reserva con nº  <?php echo $_SESSION['delete_id'];?>.</h4>
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

            <div class="mis-reservas">
                <div class="dark-wrapper">
                    <table class="table-dark">
                        <tr>
                            <th>Identificador</th>
                            <th>Fecha de reserva</th>
                            <th>Fecha de recogida</th>
                            <th>Fecha de devolución</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                        </tr>
                        <?php while ($res = $reservas->fetch_object()):?>
                            <tr>
                                <td><?php echo $res->reserva_id; ?></td>
                                <td><?php echo $res->fecha_reserva; ?></td>
                                <td><?php echo $res->fecha_inicio; ?></td>
                                <td><?php echo $res->fecha_final; ?></td>
                                <td><?php echo $res->coste_total; ?>€</td>
                                <td><?php echo $res->estado; ?></td>
                                <td>
                                   <a href="<?= base_url ?>reserva/detalle&id=<?= $res->reserva_id ?>" class="btn btn-small btn-primary mt-0">Ver</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>  
                </table>
            </div>
        </div>  
    </section>
</div>
