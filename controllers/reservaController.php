<?php
require_once 'models/vehiculo.php';
require_once 'models/reserva.php';

    class reservaController{
        
        public function mis_reservas(){
            Utils::isIdentity();
            $usuario_id= $_SESSION['identity']->id;
            $reserva = new Reserva();
            $reserva->setUsuario_id($usuario_id);
            
            //Sacamos las reservas del usuario
            $reservas= $reserva->getAllByUser();
            
            require_once 'views/reserva/mis_reservas.php';
        }
        
        public function detalle(){
            Utils::isIdentity();
            
            if (isset($_GET['id'])) {
                $reserva_id = $_GET['id'];
                
                //Obtenemos la reserva
                $reserva = new Reserva();
                $reserva->setId($reserva_id);
                
                $reserva= $reserva->getOne();
                
                //Obtenemos el vehiculo del pedido
                $vehiculo_id= $reserva->vehiculo_id;
                $vehiculo_reserva= new Vehiculo();
                $vehiculo_reserva->setId($vehiculo_id);
                $vehiculo_reserva=$vehiculo_reserva->getOneByReserva($vehiculo_id);
                
                  
                require_once 'views/reserva/detalle.php';
            }else{
                
            header('Location:'.base_url.'pedido/mis_reservas');
            }
        }
        
        public  function gestion(){
            Utils::isAdmin();
            $gestion=true;
                        
            $reserva = new Reserva();
            $reservas= $reserva->getAll();

            require_once 'views/reserva/mis_reservas.php';
            
        }
        
        public function estado(){
            Utils::isAdmin();
            if (isset($_POST['reserva_id']) && isset($_POST['estado'])) {
                
                //Recogemos datos del formulario
                $id= $_POST['reserva_id'];
                $estado= $_POST['estado'];

                //Update de la reserva
                $reserva= new Reserva();
                $reserva->setId($id);
                $reserva->setEstado($estado);
                $reserva->updateOne($estado);
                header('Location:'.base_url.'reserva/detalle&id='.$id);
            }else{
                header('Location:'.base_url.'reserva/mis_reservas');
            }
        }


        public function save(){
            if (isset($_SESSION['identity'])) {
                $usuario_id= $_SESSION['identity']->id;
                
                //Rescatamos los datos del pedido de la sesión prereserva
                $vehiculo_id= $_SESSION['prereserva']['vehiculo_id'];
                $fecha_inicio=$_SESSION['prereserva']['fecha_inicio'];
                $fecha_final=$_SESSION['prereserva']['fecha_final'];
                $dias_totales=$_SESSION['prereserva']['dias_totales'];
                $total_precio=$_SESSION['prereserva']['coste_total'];
                
                //Creamos nuevo objeto pedido y Guardamos pedido en bbdd
                $reserva= new Reserva();
                $reserva->setUsuario_id($usuario_id);
                $reserva->setVehiculo_id($vehiculo_id);
                $reserva->setFecha_inicio($fecha_inicio);
                $reserva->setFecha_final($fecha_final);
                $reserva->setDias_totales($dias_totales);
                $reserva->setCoste_total($total_precio);
                $save= $reserva->save();
                
                if ($save){
                    $_SESSION['reserva'] = "complete";
                }else{
                    $_SESSION['reserva'] = "failed";
                }
                
            }else{
                //Enviamos al usuario a registrarse
                $_SESSION['reserva'] = "failed";
                header('Location:'.base_url);
            } 
            //Renderizar vista
            header('Location:'.base_url);
        }
        
        //Método para eliminar vehículos
        public function anular(){
            Utils::isIdentity();
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $reserva = new Reserva();
                $reserva->setId($id);
                $delete = $reserva->delete();
                if ($delete) {
                 $_SESSION['delete']='complete';
                 $_SESSION['delete_id']=$reserva->getId();
                }
                else{
                 $_SESSION['delete']='failed';
                }
            }else{
                 $_SESSION['delete']='failed';
            }
            
            header('Location:'.base_url.'reserva/mis_reservas');
            
        }
        
    }