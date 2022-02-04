<?php
require_once 'models/vehiculo.php';
require_once 'models/reserva.php';

    class prereservaController{
        
        public function add(){
            if (isset($_POST['vehiculo_id'])&& isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])) {
                
                //Instanciamos el vehiculo con el id pasado de forma oculta
                $vehiculo_id = $_POST['vehiculo_id'];
                
                $vehiculo = new Vehiculo();
                $vehiculo->setId($vehiculo_id);
                $vehiculo= $vehiculo->getOne();
                
                //Instanciamos un objeto reserva con las fechas de inicio y fin seteadas para mostrarlo en la prereserva
                $inicio= ($_POST['fecha_inicio']);
                $final= ($_POST['fecha_final']);
                $fecha_inicial= new DateTime($inicio);
                $fecha_final= new DateTime($final);
                $diferencia = $fecha_inicial->diff($fecha_final);
                $total_dias = $diferencia->format('%d');
                $total_precio = $vehiculo->precio*$total_dias;
                
                $reserva = new Reserva();
                $reserva->setVehiculo_id($vehiculo_id);
                $reserva->setFecha_inicio($inicio);
                $reserva->setFecha_final($final);
                $reserva->setDias_totales($total_dias);
                $reserva->setCoste_total($total_precio);
                
                $reserva_datos = array(
                                    "vehiculo_id" => $vehiculo_id,
                                    "fecha_inicio" => $inicio,
                                    "fecha_final"=>$final,
                                    "dias_totales"=>$total_dias,
                                    "coste_total"=>$total_precio
                                );
                $_SESSION['prereserva']=$reserva_datos;
                
            }else{
                header('Location:'.base_url);
            }           
            
            //Renderizar vista
            require_once 'views/prereserva/prereserva.php';
            
        }
        
        
        
    }